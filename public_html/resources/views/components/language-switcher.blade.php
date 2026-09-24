{{-- Modern Language Switcher Component --}}
<div class="language-switcher-modern">
    <button type="button" class="language-switcher-btn" id="languageSwitcherBtn">
        <svg class="language-icon" width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
        </svg>
        <span class="language-current" id="currentLanguage">{{ $data['selectedLenguageName'] ?? 'العربية' }}</span>
        <svg class="chevron-icon" width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>

    <div class="language-dropdown" id="languageDropdown">
        <div class="language-dropdown-inner">
            @if(isset($data['languages']) && count($data['languages']) > 0)
                @foreach($data['languages'] as $language)
                    <a href="{{ url('locale/'.$language['code']) }}"
                       class="language-option language-default"
                       data-id="{{ $language['id'] }}"
                       data-name="{{ $language['name'] }}">
                        <span class="language-flag">
                            @if($language['code'] == 'ar')
                                🇪🇬
                            @elseif($language['code'] == 'en')
                                🇬🇧
                            @else
                                🌐
                            @endif
                        </span>
                        <span class="language-name">{{ $language['name'] }}</span>
                        @if($language['id'] == $data['selectedLenguage'])
                            <svg class="language-check" width="16" height="16" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                            </svg>
                        @endif
                    </a>
                @endforeach
            @else
                <a href="{{ url('locale/ar') }}" class="language-option language-default" data-id="1" data-name="العربية">
                    <span class="language-flag">🇪🇬</span>
                    <span class="language-name">العربية</span>
                </a>
                <a href="{{ url('locale/en') }}" class="language-option language-default" data-id="2" data-name="English">
                    <span class="language-flag">🇬🇧</span>
                    <span class="language-name">English</span>
                </a>
            @endif
        </div>
    </div>
</div>

<style>
.language-switcher-modern {
    position: relative;
    display: inline-block;
}

.language-switcher-btn {
    display: flex;
    align-items: center;
    gap: var(--space-2);
    padding: var(--space-2) var(--space-4);
    background: var(--bg-elevated);
    border: 1px solid rgba(0, 0, 0, 0.08);
    border-radius: var(--radius-full);
    color: var(--text-primary);
    font-size: var(--text-sm);
    font-weight: 500;
    cursor: pointer;
    transition: all var(--transition-base);
    box-shadow: var(--shadow-sm);
}

.language-switcher-btn:hover {
    background: var(--bg-hover);
    box-shadow: var(--shadow-md);
    border-color: var(--color-primary);
}

.language-icon {
    color: var(--color-primary);
    flex-shrink: 0;
}

.language-current {
    white-space: nowrap;
}

.chevron-icon {
    color: var(--text-tertiary);
    transition: transform var(--transition-base);
    flex-shrink: 0;
}

.language-switcher-btn[aria-expanded="true"] .chevron-icon {
    transform: rotate(180deg);
}

.language-dropdown {
    position: absolute;
    top: calc(100% + var(--space-2));
    left: 0;
    min-width: 180px;
    background: var(--bg-elevated);
    border: 1px solid rgba(0, 0, 0, 0.08);
    border-radius: var(--radius-lg);
    box-shadow: var(--shadow-xl);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all var(--transition-base);
    z-index: var(--z-dropdown);
}

.language-dropdown.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.language-dropdown-inner {
    padding: var(--space-2);
}

.language-option {
    display: flex;
    align-items: center;
    gap: var(--space-3);
    padding: var(--space-3) var(--space-4);
    color: var(--text-primary);
    text-decoration: none;
    border-radius: var(--radius-md);
    transition: all var(--transition-fast);
    font-size: var(--text-sm);
    font-weight: 500;
}

.language-option:hover {
    background: var(--bg-hover);
    color: var(--color-primary);
}

.language-flag {
    font-size: 1.25em;
    line-height: 1;
}

.language-name {
    flex: 1;
}

.language-check {
    color: var(--color-primary);
    flex-shrink: 0;
}

/* RTL Support */
[dir="rtl"] .language-dropdown {
    left: auto;
    right: 0;
}

@media (max-width: 768px) {
    .language-switcher-btn {
        padding: var(--space-2) var(--space-3);
    }

    .language-dropdown {
        right: 0;
        left: auto;
    }

    [dir="rtl"] .language-dropdown {
        left: 0;
        right: auto;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('languageSwitcherBtn');
    const dropdown = document.getElementById('languageDropdown');

    if (btn && dropdown) {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const isExpanded = btn.getAttribute('aria-expanded') === 'true';
            btn.setAttribute('aria-expanded', !isExpanded);
            dropdown.classList.toggle('show');
        });

        // Close on outside click
        document.addEventListener('click', function() {
            btn.setAttribute('aria-expanded', 'false');
            dropdown.classList.remove('show');
        });

        // Prevent closing when clicking inside dropdown
        dropdown.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    }
});
</script>
