<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Seja bem vindo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link  rel="stylesheet" href="{{asset('home/styles/home.css')}}" >
</head>
<body>

    <form action="{{route('update.data',$data->id)}}" method="POST">
        @csrf
        <div class="container">
          <h1>Fórmulario</h1>

          <div class="form-group">
            <label for="name">Nome completo:</label>
            <input type="text"  class="form-control" id="name" name="fullname" value="{{$data->fullname ?? ''}}" placeholder="Digite o seu nome">
            @error('fullname') <span class="text-danger">{{$message}}</span>@enderror
          
        
        </div>
        <div class="form-group">

          
          <label for="exampleDataList" class="form-label">Provincia</label>
        <select name="province" class="form-select" value="{{$data->province ?? ''}}">
          <option value="">selecionar</option>
          <option value="Luanda">Luanda</option>
          <option value="Benguela">Benguela</option>
          <option value="Uige">Uige</option>
          <option value="Huambo">Huambo</option>
          <option value="Kwanza Sul">Kwanza Sul</option>
          </select> 
          @error('province') <span class="text-danger">{{$message}}</span>@enderror

        </div>

        
        <div class="form-group">

<label for="exampleDataList" class="form-label">Nacionalidade</label>
<input name="nationality" class="form-control" value="{{$data->nationality ?? ''}}" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">

<datalist id="datalistOptions">
  <option value="Angolana">
  <option value="Brasileira">
  <option value="Suéca">
  <option value="Portuguesa">
  <option value="Alemanha">
</datalist>
@error('nationality') <span class="text-danger">{{$message}}</span>@enderror

        </div>

        <div>
          
        
            <label for="age">Idade:</label>
            <input type="number" min="1" max="150" class="form-control"  value="{{$data->age ?? ''}}" id="age" name="age">
            @error('age') <span class="text-danger">{{$message}}</span>@enderror

        </div>


        <div>
          <label for="birthday">Data nascimento:</label>
          <input type="date" class="form-control" id="birthday"  value="{{$data->birthday ?? ''}}" name="birthday">
          @error('birthday') <span class="text-danger">{{$message}}</span>@enderror

      </div>

        <div>
          <label for="phone">Telefone:</label>
          <input type="tel" class="form-control" id="phone"  value="{{$data->phonenumber ?? ''}}" name="phone">
          @error('phone') <span class="text-danger">{{$message}}</span>@enderror

      </div>
          

          <button class="btn btn-success mt-2" type="submit">Atualizar</button>
        </div>
            
    </form>

        
</body>
</html>

