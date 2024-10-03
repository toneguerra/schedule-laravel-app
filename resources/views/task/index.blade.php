<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Minha Agenda de Tarefas') }}
        </h2>
    </x-slot>


<body class="bg-slate-100">

    <main class="flex justify-center">
        <section class="bg-slate-2 mt-4 w-3/4 p-4 shadow-lg shadow-indigo-200/50">

            <div class="flex justify-end">
                <a href="/task/create" class="rounded-md bg-indigo-500 p-2 text-indigo-50 shadow-md shadow-indigo-500/50 hover:bg-indigo-400">
                    Adicionar Tarefa
                </a>
            </div>


            @include('components.flashmessages')

            <form action="{{ route('task.search') }}" method="POST">
                @csrf
                <input type="text" name="description" id="description" class="rounded-md border border-indigo-600 p-2" value="{{ $txtSrc }}" placeholder="Procure pela Descrição">
                <input type="submit" value="Procurar" />
            </form>

            <article>
                <h2 class="text-xl text-indigo-700">Tarefas Cadastradas</h2>
                <table class="mt-4 w-full table-auto">
                    <thead >
                        <tr class="bg-indigo-300 text-sm">
                            <th class="rounded-lg">id</th>
                            <th class="rounded-lg">Description</th>
                            <th class="rounded-lg">Date</th>
                            <th class="rounded-lg">Restantes</th>
                            <th class="rounded-lg">Email</th>
                            <th class="rounded-lg">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                        <tr class="text-sm">
                            <td class="rounded-lg bg-indigo-100 text-center text-sm font-bold">{{ $task->id }}</td>
                            <td class="border border-gray-200 pl-1 pr-1">{{ $task->description }}</td>
                            <td class="border border-gray-200 pl-1 pr-1">{{ Carbon\Carbon::parse($task->date)->format('d/m/Y') }}</td>
                            <td class="border border-gray-200 pl-1 pr-1">
                                <?php
                                $orig = Carbon\Carbon::now()->format('Y-m-d'); 
                                echo Carbon\Carbon::parse($orig)->diff($task->date);
                                ?>
                            </td>

                            <td>{{$task->user->email}}</td>
                            <td class="border border-gray-200 pl-1 pr-1 flex flex-row gap-2" >
                                <a href="{{route('task.edit', $task->id)}}" >
                                    <x-lucide-edit class="w-5 text-ambar-500 hover:text-red-400"/>
                                </a>

                                <a href="#" onclick="deleteTask( {{ $task->id }} )">
                                    <x-heroicon-s-trash class="w-5 text-red-500 hover:text-red-400"/>
                                </a>
                                <form class="d-none" id="form-destroy-{{$task->id}}" action="{{ route('task.destroy', $task->id ) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </article>
        </section>
    </main>
    
    

</body>

</x-app-layout>

<script>
    function deleteTask(id){
        if(confirm("Tem certeza que deseja EXCLUIR o registro?")){
            document.getElementById('form-destroy-'+id).submit();
        }
    }
</script>

<script>
    const target = document.getElementById("alertDiv");
    function hide(){
        target.style.opacity = '0'
        target.style.display = 'none';
    }
    window.onload = setInterval(() => hide(), 3000)
</script>