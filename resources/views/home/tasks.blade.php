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



    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{route('save')}}" method="POST"> 
        @csrf
        <div class="container">
          <h1>Fórmulario</h1>

          <div class="form-group">
            <label for="name">Nome completo:</label>
            <input type="text"  class="form-control" id="name" name="fullname" placeholder="Digite o seu nome">
            @error('fullname') <span class="text-danger">{{$message}}</span>@enderror
          
        
        </div>
        <div class="form-group">

          
          <label for="exampleDataList" class="form-label">Provincia</label>
        <select name="province" class="form-select" >
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
<input name="nationality" class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">

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
            <input type="number" min="1" max="150" class="form-control" id="age" name="age">
            @error('age') <span class="text-danger">{{$message}}</span>@enderror

        </div>


        <div>
          <label for="birthday">Data nascimento:</label>
          <input type="date" class="form-control" id="birthday" name="birthday">
          @error('birthday') <span class="text-danger">{{$message}}</span>@enderror

      </div>

        <div>
          <label for="phone">Telefone:</label>
          <input type="tel" class="form-control" id="phone" name="phone">
          @error('phone') <span class="text-danger">{{$message}}</span>@enderror

      </div>
          

          <button class="btn btn-primary mt-2" type="submit">Enviar</button>
        </div>
            
    </form>
  

    <div class="container">

      <form action="{{route("search")}}" method="get"> 
        <div class="col-md-12">
          <div class="input-group mb-3">
            <input type="text" class="form-control mx-2" placeholder="Pesquisar ..." aria-label="Username" aria-describedby="basic-addon1" name="search">
           
            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg>
          
          </div>
                    
        </div>
      </form>
      
        <table class="table table-hover table-striped">
          
          <thead class="table-dark text-uppercase">
            <tr>
              <th>Nome</th>
              <th>Idade</th>
              <th>Data de nascimento</th>
              <th>Nacionalidade</th>
              <th>Opção</th>
            </tr>

          </thead>

          <tbody>
            @if ($personaldata->count() > 0)
            @foreach($personaldata as $user)        

           <tr>
              <td>{{$user->fullname}}</td>
              <td>{{$user->age}}</td>
              <td>{{$user->birthday}}</td>
              <td>{{$user->nationality}}</td>
              <td>
                <div class="d-flex gap-2 align-items-center">

    


                <a href="{{route("edit.data", $user->id) }}" class="btn btn-sm btn-primary">
                    <i class="fa fa-edit"></i> 
                </a>
                 
                 
                  <a href="{{route('delete.task',$user->id)}}" class="btn btn-sm btn-danger" >
                    <i class="fa fa-trash"></i>
                  </a>


                  



                </div>
              </td>

            </tr>
            @endforeach

            @else
            <tr>
              <td colspan="9">
                <div class="alert alert-warning text-center">Nenhum registo encontrado</div>

              </td>
            </tr> 


            @endif
           
          </tbody>
          
    </div>

    
</body>
</html>