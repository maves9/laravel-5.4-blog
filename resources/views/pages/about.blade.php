@extends('layouts.app')

@section('content')
    <h1><?php echo $title; ?></h1>

    <p>Denne side er lavet fra bunden af Martin Vestergaard, i et PHP framework der hedder <a href="https://www.laravel.com">Laravel</a>. Laravel er et godt framework, da det giver en grundig organisering, bedre sikkerhed og nemmere adgang til databasen. Med andre ord færre fejl og hurtigere produktion. Her på siden demonstreres det basale af hvad der er muligt at skabe i dette framework.</p>

    <p>Laravel kan konstruere:</p>
    <ul>
        <li>Login systemer</li>
        <li>Blog sider</li>
        <li>Administration</li>
        <li>Online shop</li>
        <li>Hele CMS systemer</li>
        <li>Og andre data relaterede sider</li>
    </ul>
@endsection