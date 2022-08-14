<div class="b-example-divider"></div>

    <div class="container">
        <header class="d-flex  align-items-center py-3 mb-4 mt-4 justify-content-between">
            <a href="/" class="col-8 text-dark text-decoration-none">
                <h3>SAZANAMI<br>coffee shop</h3>
            </a>
            @if (Auth::check())
                <dir class="col-8">
                    
                    {{-- ログインページへのリンク --}}
                    <button type="button" class="btn">
                      {!! link_to_route('logout.get', 'Logout', [], ['class' => 'nav-link btn btn-outline-primary me-2']) !!}</button>
                    
    
                </dir>
            @else
                <dir class="col-8">
                    {{-- ユーザ登録ページへのリンク --}}
                    <button type="button" class="btn">{!! link_to_route('signup.get', '会員登録', [], ['class' => 'nav-link btn btn-outline-primary me-2']) !!}</button>
                    {{-- ログインページへのリンク --}}
                    <button type="button" class="btn">
                          {!! link_to_route('login', 'Login', [], ['class' => 'nav-link btn btn-outline-primary me-2']) !!}</button>
                </dir>
            @endif
  
        </header>
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">

                <ul class="nav nav-tabs" >
                    <li class="nav-item  active">
                      <a href="/" class="nav-link" >home</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('products.index') }}" class="nav-link">products</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('methods.index') }}" class="nav-link">how to</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('access.index') }}" class="nav-link">access</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('mypage.index') }}" class="nav-link">my page</a>
                    </li>
                    <li class="nav-item">
                      <a href="{{ route('orders.show') }}" class="nav-link">cart</a>
                    </li>
                  
                </ul>
                
                
            </header>
        </div>
    </div>  
