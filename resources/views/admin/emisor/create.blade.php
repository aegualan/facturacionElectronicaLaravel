@extends('admin.layouts')
@section('content')

<section class="content">
    <div class="row">
        <form role="form" method="post" action="{{route('emisor.store')}}" autocomplete="off" class="form-horizontal"
              enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-md-8">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group {{$errors->has('razonSocial') ? ' has-error' : ''}}">
                            <label for="razonSocial" class="col-sm-2 control-label">Razón Social:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="razonSocial" name="razonSocial" value="{{ old('razonSocial') }}">
                                @if ($errors->has('razonSocial'))
                                <span class="help-block">{{ $errors->first('razonSocial') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('nombreComercial') ? ' has-error' : ''}}">
                            <label for="nombreComercial" class="col-sm-2 control-label">Nombre Comercial:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombreComercial" name="nombreComercial" value="{{ old('nombreComercial') }}">
                                @if ($errors->has('nombreComercial'))
                                <span class="help-block">{{ $errors->first('nombreComercial') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{$errors->has('direccionMatriz') ? ' has-error' : ''}}">
                            <label for="direccionMatriz" class="col-sm-2 control-label">Dirección Matriz:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="2" id="direccionMatriz" name="direccionMatriz"></textarea>
                                @if ($errors->has('direccionMatriz'))
                                <span class="help-block">{{ $errors->first('direccionMatriz') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group {{$errors->has('ruc') ? ' has-error' : ''}}">
                            <label for="ruc" class="col-sm-2 control-label">Ruc:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ruc" placeholder="RUC" name="ruc" value="{{ old('ruc') }}">
                                @if ($errors->has('ruc'))
                                <span class="help-block">{{ $errors->first('ruc') }}</span>
                                @endif

                            </div>
                        </div>
                        <div class="form-group {{$errors->has('codigoEstablecimiento') ? ' has-error' : ''}}">
                            <label for="codigoEstablecimiento" class="col-sm-8 control-label">Código Establecimiento:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="codigoEstablecimiento" placeholder="001" name="codigoEstablecimiento" value="{{ old('codigoEstablecimiento') }}">

                            </div>
                            @if ($errors->has('codigoEstablecimiento'))
                            <span class="help-block">{{ $errors->first('codigoEstablecimiento') }}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('codigoPuntoEmision') ? ' has-error' : ''}}">
                            <label for="codigoPuntoEmision" class="col-sm-8 control-label">Código Punto Emisión:</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="codigoPuntoEmision" placeholder="001" name="codigoPuntoEmision" value="{{ old('codigoPuntoEmision') }}">
                                @if ($errors->has('codigoPuntoEmision'))
                                <span class="help-block">{{ $errors->first('codigoPuntoEmision') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="oblLlevarCont" class="col-sm-10 control-label">Obligado LLevar Contabilidad</label>
                            <div class="col-sm-2 checkbox">
                                <label>
                                    <input type="checkbox" name="oblLlevarCont" id='oblLlevarCont' {{ old('oblLlevarCont') ? 'checked' : '' }}>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="dropzone"></div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
