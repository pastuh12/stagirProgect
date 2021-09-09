@extends('layouts.email')
@section('content')

    <table style=" align:center; width:600px">
        <tr>
            <td>
                Имя пользователя:
            </td>
            <td align="left">{{$userName}}</td>
        </tr>
        <tr>
            <td>
                Почта:
            </td>
            <td align="left">
                {{$userEmail}}
            </td>
        </tr>
        <tr style="height: 20px">
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>Сообщение</tr>
        <tr style="height: 10px">
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr align="left">{{$text}}</tr>
    </table>
@endsection


