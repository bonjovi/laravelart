<style>
.registrationLine__messages-counter {
    width:20px;
    height: 20px;
    font-size:11px;
    border-radius: 50%;
    background-color: #9c27b0;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    right: 177px;
    margin-top: -2px;
}
</style>

<div class="registrationLine registrationLine_{{ $layoutName  }}">
    @if(Auth::user())
        <a href="{{ route('account.profile') }}" class="registrationLine__link registrationLine__link_useremail text text_small text_{{ $topmenuColor  }}">
            Личный кабинет 
        </a> 
        @isset($unreaded_messages)
            <span class="registrationLine__messages-counter">{{ count($unreaded_messages) }}</span>
        @endisset
        <a href="/logout" class="registrationLine__link text text_small text_{{ $topmenuColor  }}">Выйти</a>
    @else
        <a href="/login" class="registrationLine__link text text_small text_{{ $topmenuColor  }}">Вход</a>
        <span class="text text_small text_grey">&nbsp;или&nbsp;</span>
        <a href="/register" class="registrationLine__link text text_small text_{{ $topmenuColor  }}">регистрация</a>
    @endif
</div>
