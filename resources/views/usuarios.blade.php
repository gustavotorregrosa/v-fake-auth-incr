@extends('layout')

@section('titulo', 'Usuários')

@section('conteudo')

<button style="float: right;" id="btn-am-cadastrar-usuario" class="btn btn-sm btn-success">Cadastrar</button>

<br><br><br>


      <table class="table">
         <thead>
            <tr>
               <th scope="col">Usuario</th>
               <th scope="col">Perfil</th>
               <th scope="col">Ações</th>
            </tr>
         </thead>
         <tbody>
         @foreach($usuarios as $usuario)
            <tr>
               <td class="nome-usuario">{{$usuario->nome}}</td>
               <td>{{$usuario->papel->nome}}</td>
               <td>
                  <button data-id="{{$usuario->id}}" data-idpapel="{{$usuario->id_papel}}" data-email="{{$usuario->email}}" class="btn btn-primary btn-sm btn-edit-usuario">Editar</button>
                  <button data-id="{{$usuario->id}}" class="btn btn-danger btn-sm btn-del-usuario">Deletar</button>
               </td>
            </tr>

         @endforeach
            
         </tbody>
      </table>
            


      <div id="mdl-cria-usuario" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title">Cadastrar usuario</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <form method="post" action="{{url('/usuario')}}">
                  @csrf
                  
                     <div class="modal-body">
                        <div class="form-group">
                           <label>Nome do usuario</label>
                           <input type="text" class="form-control" name="nome">
                        </div>
                        <div class="form-group">
                           <label>Email</label>
                           <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                           <label>Senha</label>
                           <input type="password" class="form-control" name="senha">
                        </div>
                        

                        <div class="form-group">
                           <label>Papel</label>
                           <select required class="form-control" name="papel_id">
                              <option disabled selected>Escolha um papel</option>
                              @foreach($papeis as $papel)
                                <option value="{{$papel->id}}">{{$papel->nome}}</option>
                              @endforeach
                           </select> 
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





      <div id="mdl-edita-usuario" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Editar usuario</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <form id="frm-edita-usuario" method="post" action="{{url('/usuario')}}">
                     @csrf
                     @method('put')
                     
                     <input id="inpt-edita-usuario-id" type="hidden" name="id" value="">
                        <div class="modal-body">
                           <div class="form-group">
                              <label>Nome do usuario</label>
                              <input id="inpt-edita-usuario-nome" type="text" class="form-control" name="nome">
                           </div>
                           <div class="form-group">
                              <label>Email</label>
                              <input id="inpt-edita-usuario-email" type="email" class="form-control" name="email">
                           </div>

                           <div class="form-group">
                              <label>Papel</label>
                              <select id="slct-edita-usuario-papel" required class="form-control" name="papel_id">
                                 <option disabled>Escolha um papel</option>
                                 @foreach($papeis as $papel)
                                 <option value="{{$papel->id}}">{{$papel->nome}}</option>
                                 @endforeach
                              </select> 
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



      <div id="mdl-deleta-usuario" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title">Deletar usuario</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                  </button>
                  <form id="frm-deleta-usuario" method="post">
                  @csrf
                  @method('delete')
                  </div>
                     <div class="modal-body">   
                        <p>Deletar usuario?</p>
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
