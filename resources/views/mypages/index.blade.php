
    <div class="row">
            <h6 class='text col-sm-2'>会員情報</h6><br>
                    <div class='text col-9'>
                        <div class='row'>
                            <p class='col-sm-3'>お名前</p>
                            <p>{{ Auth::user()->name }}</p>
                        </div>
                        <div class='row'>
                            <p class='col-sm-3'>e-mail</p>
                            <p>{{ Auth::user()->email }}</p>
                        </div>
                        <div class='row'>
                            <p class='col-sm-3'>郵便番号</p>
                            <p>{{ Auth::user()->adress_number }}</p>
                        </div>
                        <div class='row'>
                            <p class='col-sm-3'>ご住所</p>
                            <p>{{ Auth::user()->address }}</p>
                        </div>
                        <div class='row'>
                            <p class='col-sm-3'>電話番号</p>
                            <p>{{ Auth::user()->tel }}</p>
                        </div>
                        <br><br>
                        <button type="button" class="btn btn-outline-primary me-2">
                            {!! link_to_route('mypages.edit', '編集する', ['mypage' => Auth::user()->id]) !!}</td>
                        </button>
                        
                </tr>
                    </div>
                
    </div>
