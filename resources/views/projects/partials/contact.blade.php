<div class="card">
    <div class="card-body">
        <h4 class="card-title">Contactos del proyecto</h4>

        <div id="contacts-list">
            <ul class="list-unstyled">

                @forelse($project->contacts as $contact)

                    <li>
                        {!! Form::open(['url' => route('contacts.detach', $contact->id), 'method' => 'put', 'class' => 'float-right', 'style' => 'display: inline']) !!}
                        {!! Form::hidden('project_id', $project->id) !!}
                        <button type="submit" class="text-danger non-styled-button"><i class="mdi mdi-close"></i></button>
                        {!! Form::close() !!}
                        <a href="">{!! $contact->fullname !!}</a><br>
                        <small class="text-muted">{!! $contact->email !!}</small>
                        <small class="text-muted">{!! ($contact->phone)? ' - tel '.$contact->phone : '' !!}</small>
                    </li>

                @empty

                    <li><span class="text-muted">No hay ningún contacto adjuntado a este proyecto.</span></li>

                @endforelse
            </ul>
            <button type="button" id="add-contact-button" class="btn btn-sm btn-outline-primary mt-3">+ Agregar contacto</button>
        </div>

        <div id="existing-contacts" style="display: none">
            {!! Form::open(['url' => route('contacts.attach'), 'method' => 'put']) !!}

            {!! Form::hidden('project_id', $project->id) !!}

            <div class="row">
                <div class="col-lg-9">
                    {!! Form::select('contact_id[]', $contacts, null, ['class' => 'selectize', 'multiple' => true, 'placeholder' => 'Vincular contacto existente...']) !!}
                </div>
                <div class="col-lg-3">
                    <button type="submit" class="btn btn-secondary btn-sm">aceptar</button>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
        <div id="add-contact" class="mt-3" style="display: none; border: 1px solid beige; padding: 10px 20px">
            <p>Agregar y vincular nuevo contacto:</p>
            {!! Form::open(['url' => route('contacts.store'), 'method' => 'post']) !!}

            {!! Form::hidden('project_id', $project->id) !!}
            <div class="form-group">
                {!! Form::label('name', 'Nombre') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('last_name', 'Apellido') !!}
                {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('phone', 'Teléfono') !!}
                {!! Form::text('phone', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('address', 'Dirección') !!}
                {!! Form::text('address', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('remarks', 'Observaciones') !!}
                {!! Form::textarea('remarks', null, ['class' => 'form-control', 'rows' => '9']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
                <button type="button" class="btn btn-secondary" id="cancel-add-contact">Cancelar</button>
            </div>

            {!! Form::close() !!}
        </div>

    </div>
</div>