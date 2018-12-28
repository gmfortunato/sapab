@extends('admin.layouts.blank')

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">

        <div class="row">
            <div class="content-message">
                @if(Session::has('success'))
                    <div class="container">
                        {!! Alert::success(Session::get('success'))->close()  !!}
                    </div>
                @elseif(Session::has('error'))
                    <div class="container">
                        {!! Alert::danger(Session::get('error'))->close() !!}
                    </div>
                @endif
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Editar "{{$place->title}}"</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        {!!
                        form($form->add('edit','submit', [
                            'attr' => ['class' => 'btn btn-primary'],
                            'label' => 'Editar'
                        ]))
                        !!}

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /page content -->
@endsection