@if(Auth::user()->name == 'admin')
    @extends('admin.layouts.admin')
    @section('content')
    <h1>Manage Payments</h1>
    <hr>
    @if(session()->has('flash_message') )
      <div class="alert alert-{{ session('message.level') }}">
      {!! session('flash_message') !!}
      </div>
    @endif

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-bill-alt"></i>
            Manage Payments</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed; width: 100%">
                    <thead>
                        <tr>
                            <th>#PaymentID</th>
                            <th>Payment Method</th>
                            <th>Invoice Number</th>
                            <th>Account Name</th>
                            <th>Ammount Paid</th>
                            <th>Date Paid</th>
                            <th>Payment Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#PaymentID</th>
                            <th>Payment Method</th>
                            <th>Invoice Number</th>
                            <th>Account Name</th>
                            <th>Ammount Paid</th>
                            <th>Date Paid</th>
                            <th>Payment Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if (count($payments) > 0)
                        @foreach ($payments as $payment)
                        <tr>
                            <td><a href="managepayments/{{ $payment->paymentID }}">{{ $payment->paymentID }}</a></td>
                            <td style="word-wrap: break-word;">{{ $payment->paymentMethod }}</td>
                            <td style="word-wrap: break-word;">{{ $payment->invoiceNumber }}</td>
                            <td style="word-wrap: break-word;">{{ $payment->accountName }}</td>
                            <td style="word-wrap: break-word;">{{ $payment->ammountPaid }}</td>
                            <td style="word-wrap: break-word;">{{ $payment->datePaid }}</td>
                            <td><a href="/storage/payment_images/{{ $payment->payment_image }}" target="_blank"> <img class="img-fluid img-thumbnail border border-primary" src="/storage/payment_images/{{ $payment->payment_image }}" alt=""></a></td>

                            <td>

                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                      {!! Form::open(['action' => ['ManageBillingController@update', $payment->paymentID],'method' => 'POST','enctype' => 'multipart/form-data']) !!}
                                      {{ Form::hidden('_method','PUT') }}
                                      {{Form::submit('Approve Payment', ['class'=> 'dropdown-item btn btn-primary', 'style' => 'background-color: #66ccff;'])}}
                                      {!! Form::close() !!}

                                      {!! Form::open(['action' => ['ManageBillingController@deny', $payment->paymentID],'method' => 'POST','enctype' => 'multipart/form-data']) !!}
                                      {{ Form::hidden('_method','PUT') }}
                                      {{Form::submit('Deny Payment', ['class'=> 'dropdown-item btn btn-primary', 'style' => 'background-color: #ff9980;'])}}
                                      {!! Form::close() !!}
                                    </div>
                                </div>

                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
                <div class="text-center">
                    {{ $payments->links() }}
                </div>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>

    @endsection
    @else
    @section('content')
    <h1><strong>You are not authorized to view this page.</strong></h1>
    <a class="btn btn-danger btn-xl" href="/dashboard"><i class="fa fa-backspace"></i> Go back!</a>
    @endsection

    @endif
