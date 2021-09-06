@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Send Message</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sendmessage') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Message</label>

                            <div class="col-md-6">
                                <textarea id="message" type="text" class="form-control @error('message') is-invalid @enderror" name="message" required autocomplete="message" autofocus></textarea>
                                <input type="text" name="access_token" value="{{ $data['access_token'] }}" hidden>
                                <input type="text" name="subscriber_number" value="{{ $data['subscriber_number'] }}" hidden>
                                <input type="text" name="sender_address" value="5390" hidden>
                                <input type="text" name="address" value="9367726714" hidden>
                                @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
