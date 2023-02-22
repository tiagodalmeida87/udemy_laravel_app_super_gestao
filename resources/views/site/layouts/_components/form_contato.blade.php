 {{ $slot }}
 <form action={{ route('site.contato') }} method="post">
     @csrf
     <input name="nome" value = "{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe }}">
     @if ($errors->has('nome'))
         {{ $errors->first('nome') }}
     @endif
     <br>
     <input name="telefone" value = "{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe }}">
     @if ($errors->has('telefone'))
         {{ $errors->first('telefone') }}
     @endif
     <br>
     <input name="email" value = "{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe }}">
     @if ($errors->has('email'))
         {{ $errors->first('email') }}
     @endif
     <br>
     {{-- {print_r($motivo_contatos)}} --}}
     <select name="motivo_contatos_id" class="{{ $classe }}">
         <option value="">Qual o motivo do contato?</option>

        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{$motivo_contato->id}}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : ''}}>{{$motivo_contato->motivo_contato}}</option>
        @endforeach
 
        {{-- <option value="1" {{ old('motivo_contato') == 1 ? 'selected': '' }}>Dúvida</option>
         <option value="2" {{ old('motivo_contato') == 2 ? 'selected': '' }}>Elogio</option>
         <option value="3" {{ old('motivo_contato') == 3 ? 'selected': '' }}>Reclamação</option> --}}
     </select>
     {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
     <br>
     <textarea name="mensagem" class="{{ $classe }}"> {{ (old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem'}}</textarea>
     {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}     
     {{-- @if(old('mensagem') != '') 
            {{ old('mensagem') }}
        @else
            Preencha aqui a sua mensagem
        @endif 
    </textarea> --}}
     <br>
     <button type="submit" class="{{ $classe }}">ENVIAR</button>
 </form>

 @if($errors->any())
    <div style="position:absolute; top:0px, widht:100%">
        @foreach ($errors->all() as $erro)
            {{ $erro }}
            <br>
        @endforeach
    </div>
@endif