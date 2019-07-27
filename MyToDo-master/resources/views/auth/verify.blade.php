@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">メールアドレス確認</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            メールアドレス確認用リンクが更新されました。メールアドレスに届いているメールをチェックしてください。
                        </div>
                    @endif

                    登録しているメールアドレス宛に届いているメールアドレス確認用のリンクをクリックしてください。
                    まだメールがこない場合、 <a href="{{ route('verification.resend') }}">確認用メールを再度送信する</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
