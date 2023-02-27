@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Login</h1>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form action={{ route('site.login') }} method="post">
                    @csrf
                    <input name="usuario" value="{{ old('usuario') }}" type="text" placeholder="Email do usuário" class="borda-preta">
                    {{ $errors->has('usuario') ? $errors->first('usuario') : '' }}
                    <input name="senha" value="{{ old('senha') }}" type="password" placeholder="Senha" class="borda-preta">
                    {{ $errors->has('senha') ? $errors->first('senha') : '' }}
                    <button type="submit" class="borda-preta">Acessar</button>
                </form>
                {{ isset($erro) && $erro != '' ? $erro : '' }}
                {{-- <div class="contato-principal">
               @component('site.layouts._components.form_contato', ['classe' => 'borda-preta', 'motivo_contatos' => $motivo_contatos])
                <p>A nossa equipe analisará a sua mensagem e retornaresmos o mais brevemente possível!</p>
                <p>Nosso tempo médio de resposta é de 48 horas.</p>
               @endcomponent
            </div> --}}
            </div>
        </div>
    </div>

    {{-- mostra do Array(Option) na view Contato --}}
    {{-- {{print_r($motivo_contatos) }} --}}

    <div class="rodape">
        <div class="redes-sociais">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="area-contato">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="localizacao">
            <h2>Localização</h2>
            <img src="{{ asset('img/mapa.png') }}">
        </div>
    </div>
@endsection
