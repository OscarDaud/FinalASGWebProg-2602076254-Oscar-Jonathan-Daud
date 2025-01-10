@extends('layout.guest_master')

@section('content')

    <div class="h-100 d-flex justify-content-center align-items-center">
        <div class="card" style="width: 20rem;">
            <div class="card-header text-center">
                {{ __('guest/payment.title') }}
            </div>
            <form method="POST" action="{{ route('api.pay') }}" class="card-body">
                @csrf
                <div class="mb-3">
                    <label for="amount" class="form-label">{{ __('guest/payment.amount') }}</label>
                    <input type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" id="amount" value="{{ old('amount') }}" required>
                    @error('amount')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-primary">{{ __('guest/payment.pay_button') }}</button>
                </div>
            </form>
        </div>
    </div>

    @if (session('min') || session('max'))
        <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="paymentModalLabel">{{ __('guest/payment.modal_title') }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if (session('min'))
                            {{ __('guest/payment.underpaid', ['amount' => session('min')]) }}
                        @elseif (session('max'))
                            {{ __('guest/payment.overpaid', ['amount' => session('max')]) }}
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('guest/payment.close_button') }}</button>
                        @if (session('max'))
                            <a href="{{ route('guest.login') }}" class="btn btn-primary">{{ __('guest/payment.yes_button') }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <script>
            const paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'));
            paymentModal.show();
        </script>
    @endif

@endsection