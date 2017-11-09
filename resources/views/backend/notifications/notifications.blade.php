@extends('layouts.app')

@section('content')
    <h1>Notifications</h1>
    <h2>Unread Notifications</h2>
    @foreach(Auth::user()->unreadNotifications as $notification)

        <li>
            <a href="{{isset($notification->data['url'])?$notification->data['url']:"#"}}">{{$notification->data['msg']}}</a></li>
    @endforeach
    <h2>Read Notifications</h2>
    @foreach(Auth::user()->readNotifications as $notification)
        <li>
            <a href="{{isset($notification->data['url'])?$notification->data['url']:"#"}}">{{$notification->data['msg']}}</a></li>
    @endforeach
@stop