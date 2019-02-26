@extends('layout')

@section('titulo', 'Papeis')

@section('conteudo')
   
      <button style="float: right;" id="btn-am-cadastrar-papel" class="btn btn-sm btn-success">Cadastrar</button>

      <br><br><br>

         <table class="table">
         <thead>
            <tr>
               <th scope="col">Perfil</th>
               <th scope="col">Ações</th>
            </tr>
         </thead>
         <tbody>
         @foreach($papeis as $papel)
            <tr>
               <td class="nome-papel">{{$papel->nome}}</td>
               <td>
                  <button data-id="{{$papel->id}}"" class="btn btn-primary btn-sm btn-edit-papel">Editar</button>
                  <button data-id="{{$papel->id}}"" class="btn btn-danger btn-sm btn-del-papel">Deletar</button>
               </td>
            </tr>

         @endforeach
            
         </tbody>
         </table>
            

         <div id="mdl-cria-papel" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title">Cadastrar papel</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  <form method="post" action="{{url('/papel')}}">
                  @csrf
                  
                  </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <label>Nome do perfil</label>
                           <input type="text" class="form-control" name="nome">
                        </div>
                     </div>
                  <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">Save changes</button>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                  </form>
               </div>
            </div>
            </div>


            <div id="mdl-edita-papel" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title">Edita papel</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  <form id="frm-edita-papel" method="post">
                  @csrf
                  @method('put')
                  </div>
                     <div class="modal-body">   
                        <div class="form-group">
                           <label>Nome do papel</label>
                           <input id="inp-edita-papel" type="text" class="form-control" name="nome">
                        </div>
                     </div>
                  <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">Save changes</button>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                  </form>
               </div>
            </div>
            </div>


            <div id="mdl-deleta-papel" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title">Deletar papel</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  <form id="frm-deleta-papel" method="post">
                  @csrf
                  @method('delete')
                  </div>
                     <div class="modal-body">   
                        <p>Deletar papel?</p>
                     </div>
                  <div class="modal-footer">
                     <button type="submit" class="btn btn-danger">Deletar</button>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                  </form>
               </div>
            </div>
            </div>
   
@endsection
