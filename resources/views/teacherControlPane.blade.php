@extends('layouts.layout')
@section('header')
@section('body')
    <p class="centerA">
        <button class="buttonPainel" href="{{url('/contents/create')}}">Cadastro de conteudo</button>
    </p>
    <div class="centerTable">
        <table style="border: 1px solid black">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Autor</th>
                    <th>Editar</th>
                    <th>Deletar</th>
                    <th>Mostrar tudo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contents as $item)
                {{-- teachers can only edit their content --}}
                @if($item->user_id == Auth::id())
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->text}}</td>
                        <td>{{$item->user->name}}</td>
                        <td>
                            
                            <form action="{{url('/contents/' . $item->id. '/edit')}}" method="GET">
                                @csrf
                                @method('PUT')
                                <button type="submit">Editar</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{url('/contents/' . $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Deletar</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{url('/contents/' . $item->id)}}" method="GET">
                                @csrf
                                <button type="submit">Mostrar</button>
                            </form>
                        </td>
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection