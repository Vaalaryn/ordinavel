@extends('template')

@section('title')
    Connexion
@endsection
@section('source')

@endsection

@section('content')
    <div class="block box container connect is-one-third-desktop column">
        <h2 class="title has-test-centered">Identifiez-vous :</h2>
        <form action="login" method="POST" class="field is-clearfix">
            <div class="control">
                <label for="nigend" class="label">Nigend :</label>
                <input type="text" name="nigend" id=nigend class="input is-medium">
                <label for="us_mdp" class="label">Mot de passe :</label>
                <input type="password" name="us_mdp" id="us_mdp" class="input is-medium">
            </div>
            @csrf
            <input type="submit" name="Se Connecter" class="button button-connect is-link is-medium is-pulled-right">
        </form>

        <footer class="card-footer">
            <a href="a-propos" class="card-footer-item button is-info is-outlined">A propos</a>
            <a href="inscription" class="card-footer-item button is-info is-outlined">Inscription</a>
            <a href="contact" class="card-footer-item button is-info is-outlined">Contact</a>
        </footer>
    </div>
@endsection