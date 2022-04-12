<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$estudiante->id}}">
    {{Form::Open(array('action'=>array('App\http\Controllers\EstudianteController@destroy',$estudiante->id),'method'=>'delete'))}}
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Eliminar Estudiante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Confirme si desea eliminar al estudiante</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Confirmar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
{{Form::Close()}}