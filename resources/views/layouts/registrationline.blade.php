<div class="registrationLine registrationLine_{{ $layoutName  }}">
    @if(Auth::user())
        <a href="/account" class="registrationLine__link registrationLine__link_useremail text text_small text_{{ $topmenuColor  }}">
            {{ Auth::user()->email }}
        </a>
        <a href="/logout" class="registrationLine__link text text_small text_{{ $topmenuColor  }}">Выйти</a>
    @else
        <a href="/login" class="registrationLine__link text text_small text_{{ $topmenuColor  }}">Вход</a>
        <span class="text text_small text_grey">&nbsp;или&nbsp;</span>
        <a href="/register" class="registrationLine__link text text_small text_{{ $topmenuColor  }}">регистрация</a>
    @endif
</div>
