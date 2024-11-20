<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'summary' => 'required|string',
            'authors' => 'required|array',
            'advisor' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf|max:2048', // Máximo 2 MB
            'center' => 'required|string',  // Validación para el campo 'center'
            'program' => 'required|string',  // Validación para el campo 'program'
        ]);

        // Guardar el archivo
        $filePath = $request->file('file')->store('projects', 'public');

        // Guardar los datos en la base de datos
        Project::create([
            'name' => $request->name,
            'summary' => $request->summary,
            'authors' => $request->authors,  // Guardar el arreglo de autores
            'advisor' => $request->advisor,
            'file_path' => $filePath,
            'url' => $request->url,
            'type' => $request->type,
            'center' => $request->center,  // Guardar el valor seleccionado para 'center'
            'program' => $request->program,  // Guardar el valor seleccionado para 'program'
        ]);

        return redirect()->back()->with('success', 'Proyecto guardado exitosamente.');
    }


    public function search(Request $request)
    {
        $search = $request->input('query');

        // Obtener la lista de autores únicos
        $authors = Project::pluck('authors')->flatten()->unique();

        // Filtrar proyectos por nombre, resumen o autor
        $projects = Project::where('name', 'like', "%$search%")
        ->orWhere('summary', 'like', "%$search%")
        ->orWhereJsonContains('authors', $search)
            ->get();

        // Obtener todos los títulos de proyectos únicos
        $titles = Project::pluck('name')->unique();

        // Retornar la vista con los proyectos filtrados, la lista de autores y los títulos
        return view('buscar', compact('projects', 'authors', 'titles'));
    }



    


    public function show($id)
    {
        // Buscar el proyecto por su ID
        $project = Project::findOrFail($id);

        // Pasar los datos del proyecto a la vista 'projects.show'
        return view('projects.show', compact('project'));
    }

    public function showPDF($id)
    {
        // Obtener el proyecto de la base de datos
        $project = Project::findOrFail($id);

        // Recuperar la ruta del archivo PDF desde la base de datos
        $filePath = $project->file_path;

        // Asegúrate de que el archivo existe en la ubicación especificada
        if (file_exists(public_path('storage/' . $filePath))) {
            // Retornar el archivo PDF
            return Response::file(public_path('storage/' . $filePath));
        }

        // Si el archivo no se encuentra, retornar un error 404
        return abort(404, 'Archivo PDF no encontrado');
    }

    public function mostrarTitulos()
    {
        // Obtener todos los títulos de proyectos únicos
        $titles = Project::pluck('name')->unique();

        // Obtener todos los autores únicos
        $authors = Project::pluck('authors')->flatten()->unique();

        return view('buscar', compact('titles', 'authors'));
    }



    public function mostrarAutores()
    {
        // Obtener todos los autores únicos
        $authors = Project::pluck('authors')->flatten()->unique();

        // Obtener todos los títulos de proyectos únicos
        $titles = Project::pluck('name')->unique();

        return view('buscar', compact('authors', 'titles'));
    }


    public function buscarPorAutor(Request $request)
    {
        $author = $request->input('author');

        // Obtener los proyectos de ese autor
        $projects = Project::whereJsonContains('authors', $author)->get();

        // Obtener todos los autores y títulos para los filtros
        $authors = Project::pluck('authors')->flatten()->unique();
        $titles = Project::pluck('name')->unique();

        return view('buscar', compact('projects', 'authors', 'titles'));
    }


    public function buscarPorTitulo(Request $request)
    {
        $title = $request->input('title');

        // Obtener los proyectos con el título seleccionado
        $projects = Project::where('name', 'like', "%$title%")->get();

        // Obtener todos los autores y títulos para los filtros
        $authors = Project::pluck('authors')->flatten()->unique();
        $titles = Project::pluck('name')->unique();

        return view('buscar', compact('projects', 'authors', 'titles'));
    }

    public function index(Request $request)
    {
        $titles = Project::select('title')->distinct()->get(); // Aquí obtienes los títulos de los proyectos
        $authors = Project::select('author')->distinct()->get(); // Aquí obtienes los autores de los proyectos
        $projects = Project::all(); // O puedes filtrar los proyectos según la búsqueda

        return view('nombre-de-tu-vista', compact('titles', 'authors', 'projects'));
    }

    public function searchProjects($type, $value)
    {
        if ($type == 'author') {
            $projects = Project::where('author', 'like', "%$value%")->get();
        } elseif ($type == 'title') {
            $projects = Project::where('title', 'like', "%$value%")->get();
        } else {
            $projects = [];
        }

        return response()->json(['projects' => $projects]);
    }






}
