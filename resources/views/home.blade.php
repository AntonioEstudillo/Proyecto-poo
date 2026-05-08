@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Card Clientes -->
            <a href="{{ route('clientes.index') }}" class="group p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-blue-50 transition-all duration-200">
                <div class="flex items-center mb-3">
                    <div class="p-3 bg-blue-100 text-blue-600 rounded-full group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h5 class="ml-3 text-xl font-bold tracking-tight text-gray-900">Clientes</h5>
                </div>
                <p class="text-sm text-gray-600">Gestión de socios, susucripciones y datos personales.</p>
            </a>

            <!-- Card Entrenadores -->
            <a href="{{ route('entrenadores.index') }}" class="group p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-green-50 transition-all duration-200">
                <div class="flex items-center mb-3">
                    <div class="p-3 bg-green-100 text-green-600 rounded-full group-hover:bg-green-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h5 class="ml-3 text-xl font-bold tracking-tight text-gray-900">Entrenadores</h5>
                </div>
                <p class="text-sm text-gray-600">Administración de staff y contacto.</p>
            </a>

            <!-- Card Membresías -->
            <a href="{{ route('membresias.index') }}" class="group p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-purple-50 transition-all duration-200">
                <div class="flex items-center mb-3">
                    <div class="p-3 bg-purple-100 text-purple-600 rounded-full group-hover:bg-purple-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                        </svg>
                    </div>
                    <h5 class="ml-3 text-xl font-bold tracking-tight text-gray-900">Membresías</h5>
                </div>
                <p class="text-sm text-gray-600">Control de planes, precios y vigencias del gimnasio.</p>
            </a>

            <!-- Card Asistencias -->
            <a href="{{ route('asistencias.index') }}" class="group p-6 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-orange-50 transition-all duration-200">
                <div class="flex items-center mb-3">
                    <div class="p-3 bg-orange-100 text-orange-600 rounded-full group-hover:bg-orange-600 group-hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <h5 class="ml-3 text-xl font-bold tracking-tight text-gray-900">Asistencias</h5>
                </div>
                <p class="text-sm text-gray-600">Registro de entradas.</p>
            </a>

        </div>
    </div>
</div>

@endsection