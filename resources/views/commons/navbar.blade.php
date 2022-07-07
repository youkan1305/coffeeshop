<div class="b-example-divider"></div>

  <div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <a href="/" class="d-flex align-items-center col-md-4 mb-2 mb-md-0 text-dark text-decoration-none">
        <h3>SAZANAMI coffee shop</h3>
      </a>
      @if (Auth::check())
    　　　<dir class="offset-md-8 col-6">
              {{-- マイページへのリンク --}}
              {{-- <button type="button" class="btn">{!! link_to_route('signup.get', '会員登録', [], ['class' => 'nav-link btn btn-outline-primary me-2']) !!}</button>
              {{-- ログインページへのリンク --}}
              <button type="button" class="btn">
                {!! link_to_route('logout.get', 'Logout', [], ['class' => 'nav-link btn btn-outline-primary me-2']) !!}</button>
               
              <button type="button" class="btn ">
                    <i class="fab fa-twitter-square"></i>
              </button>
              <button type="button" class="btn text-end"><a href="https://twitter.com/">
                    <i class="fab fa-instagram-square"></i></a>
              </button>
          </dir>
      @else
        <dir class="offset-md-8 col-6">
          {{-- ユーザ登録ページへのリンク --}}
          <button type="button" class="btn">{!! link_to_route('signup.get', '会員登録', [], ['class' => 'nav-link btn btn-outline-primary me-2']) !!}</button>
          {{-- ログインページへのリンク --}}
          <button type="button" class="btn">
                {!! link_to_route('login', 'Login', [], ['class' => 'nav-link btn btn-outline-primary me-2']) !!}</button>
        </dir>
      @endif
      
    </header>
 </div>
