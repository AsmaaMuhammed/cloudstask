@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.users')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home </a></li> &nbsp;&nbsp;
                <li><a href="{{ route('customers.index') }}"> Customers</a></li>&nbsp;&nbsp;
                <li class="active">edit</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">Edit</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    <form action="{{ route('customers.update', $customer->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group">
                            <label>name</label>
                            <input type="text" name="name" class="form-control" value="{{ $customer->name }}">
                        </div>

                        <div class="form-group">
                            <label>email</label>
                            <input type="email" name="email" class="form-control" value="{{ $customer->email }}">
                        </div>

                        <div class="form-group">
                            <input class="form-check-input" type="checkbox" value="1" id="active" name="active" checked>
                            <label class="form-check-label" for="active">
                                active
                            </label>

                        </div>

                        <div class="form-group">
                            <label>Charges</label>


                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Edit </button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
