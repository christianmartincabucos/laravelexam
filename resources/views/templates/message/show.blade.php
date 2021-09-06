@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Send Message</div>
                {{ $datas['outboundSMSMessageRequest'] }}
                <div class="card-body">
                    <table class="table table-sm text-center table-hover rounded-lg">
                        <thead class="thead-dark">
                            <tr>
                                <th>Sender Address</th>
                                <th>Address</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
