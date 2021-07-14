@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            {{--<h1>Customers</h1>--}}

            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Home </a></li> &nbsp; &nbsp;
                <li class="active">Customers</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">
                    @if ($customers->count() > 0)

                    <h3 class="box-title" style="margin-bottom: 15px">No Customers <small>{{ $customers->total() }}</small></h3>

                    <form action="{{ route('customers.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                            </div>

                        </div>
                    </form><!-- end of form -->
                        @endif


                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($customers->count() > 0)

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">email</th>
                                <th scope="col">active</th>
                                <th scope="col">role</th>
                                <th scope="col">actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($customers as $index=>$customer)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->active }}</td>
                                    <td>{{ $customer->role }}</td>
                                    <td>
                                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="{{ route('customers.changeActive', $customer->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> {{$customer->active == 0 ? 'reactivate' : 'deactivate'}}</a>
                                        <form action="{{ route('customers.destroy', $customer->id) }}" method="post" style="display: inline-block">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> Delete</button>
                                        </form><!-- end of form -->
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table><!-- end of table -->

                        {{ $customers->appends(request()->query())->links() }}

                    @else

                        <h2>Data Not Found</h2>

                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection