<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')

    <title>Agenda de Tarefas</title>
</head>
<body class="bg-slate-100">

    <main class="flex justify-center">
        <section class="bg-slate-2 mt-4 w-3/4 p-4 shadow-lg shadow-indigo-200/50">

        <h1 class="text-2xl text-indigo-800">Modificar Tarefa: Atualizar</h1>

        <hr class="mb-2 mt-2">

            <form action="{{route('task.update', $task->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="mt-4 flex flex-col">
                    <label for="description" class="text-indigo-500">Descrição da Tarefa:</label>
                    <input type="text" name="description" id="description" class="rounded-md border border-indigo-600 p-2" value="{{ @old('description', $task->description) }}">
                    @error('description')
                        <p class="text-muted text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4 flex flex-col">
                    <label for="date" class="text-indigo-500">Data programada:</label>
                    <input type="date" name="date" id="date" class="rounded-md border border-indigo-600 p-2" value="{{ @old('date', $task->date) }}">
                    @error('date')
                        <p class="text-muted text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4 mt-4 flex justify-end gap-2">
                    <input type="submit" value="Salvar Alterações" class = "rounded-md bg-indigo-500 p-2 text-indigo-50 shadow-md shadow-indigo-500/50 hover:bg-indigo-400 min-w-48"/>
                    <a href="{{route('task.index')}}" class = "text-center rounded-md bg-red-500 p-2 text-red-50 shadow-md shadow-red-500/50 hover:bg-red-400 min-w-48">Cancelar</a>
                </div>
            </form>
        </section>
    </main>
    
</body>
</html>