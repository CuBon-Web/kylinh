@switch($type)
    @case('vacuum')
        <svg viewBox="0 0 200 140" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><ellipse cx="100" cy="122" rx="72" ry="7" fill="#e7eeea"/><rect x="36" y="58" width="128" height="52" rx="6" fill="#d5dee2" stroke="#6d7c82" stroke-width="2"/><rect x="36" y="58" width="128" height="16" rx="6" fill="#eef3f4"/><rect x="48" y="42" width="104" height="20" rx="3" fill="#9aadb4" stroke="#6d7c82" stroke-width="1.5"/><rect x="58" y="48" width="28" height="8" rx="2" fill="#297c49"/><circle cx="112" cy="86" r="7" fill="#297c49"/><rect x="126" y="80" width="24" height="12" rx="2" fill="#7d8e94"/><path d="M70 96h40" stroke="#6d7c82" stroke-width="2" stroke-linecap="round"/></svg>
        @break
    @case('table')
        <svg viewBox="0 0 200 140" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><ellipse cx="100" cy="122" rx="70" ry="7" fill="#e7eeea"/><path d="M28 52h144l-8 10H36L28 52Z" fill="#c5d2d6" stroke="#6d7c82" stroke-width="1.5"/><rect x="36" y="62" width="128" height="8" fill="#e8eef0" stroke="#6d7c82" stroke-width="1.5"/><path d="M46 70v40M154 70v40M46 96h108" stroke="#8aa0a6" stroke-width="4" stroke-linecap="round"/><rect x="42" y="108" width="12" height="6" rx="1" fill="#6d7c82"/><rect x="146" y="108" width="12" height="6" rx="1" fill="#6d7c82"/></svg>
        @break
    @case('shelf')
        <svg viewBox="0 0 200 140" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><ellipse cx="100" cy="124" rx="64" ry="6" fill="#e7eeea"/><path d="M48 28h8v88h-8zM144 28h8v88h-8z" fill="#8aa0a6"/><rect x="42" y="36" width="116" height="6" rx="1" fill="#d5dee2" stroke="#6d7c82"/><rect x="42" y="62" width="116" height="6" rx="1" fill="#d5dee2" stroke="#6d7c82"/><rect x="42" y="88" width="116" height="6" rx="1" fill="#d5dee2" stroke="#6d7c82"/><rect x="42" y="110" width="116" height="6" rx="1" fill="#c5d2d6" stroke="#6d7c82"/><rect x="62" y="44" width="22" height="14" rx="2" fill="#297c49" opacity=".85"/><rect x="96" y="70" width="28" height="14" rx="2" fill="#b7c6cb"/></svg>
        @break
    @case('scale')
        <svg viewBox="0 0 200 140" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><ellipse cx="100" cy="122" rx="60" ry="6" fill="#e7eeea"/><rect x="46" y="78" width="108" height="28" rx="6" fill="#d5dee2" stroke="#6d7c82" stroke-width="2"/><rect x="70" y="48" width="60" height="28" rx="4" fill="#eef3f4" stroke="#6d7c82" stroke-width="2"/><text x="100" y="67" text-anchor="middle" font-size="14" font-family="Montserrat, sans-serif" font-weight="700" fill="#297c49">0.00</text><rect x="58" y="86" width="84" height="8" rx="2" fill="#9aadb4"/><circle cx="64" cy="98" r="3" fill="#297c49"/></svg>
        @break
    @case('slicer')
        <svg viewBox="0 0 200 140" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><ellipse cx="100" cy="122" rx="68" ry="6" fill="#e7eeea"/><rect x="30" y="88" width="140" height="16" rx="4" fill="#c5d2d6" stroke="#6d7c82"/><circle cx="78" cy="72" r="34" fill="#e8eef0" stroke="#6d7c82" stroke-width="3"/><circle cx="78" cy="72" r="8" fill="#297c49"/><rect x="108" y="52" width="52" height="36" rx="4" fill="#d5dee2" stroke="#6d7c82"/><path d="M118 64h32M118 74h24" stroke="#6d7c82" stroke-width="2" stroke-linecap="round"/></svg>
        @break
    @case('grinder')
        <svg viewBox="0 0 200 140" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><ellipse cx="100" cy="122" rx="62" ry="6" fill="#e7eeea"/><rect x="58" y="70" width="70" height="40" rx="8" fill="#d5dee2" stroke="#6d7c82" stroke-width="2"/><path d="M78 70c0-22 10-36 22-36s22 14 22 36" fill="#eef3f4" stroke="#6d7c82" stroke-width="2"/><rect x="118" y="82" width="36" height="14" rx="7" fill="#9aadb4" stroke="#6d7c82"/><circle cx="86" cy="90" r="6" fill="#297c49"/><rect x="70" y="108" width="18" height="6" rx="1" fill="#6d7c82"/><rect x="98" y="108" width="18" height="6" rx="1" fill="#6d7c82"/></svg>
        @break
    @case('trolley')
        <svg viewBox="0 0 200 140" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><ellipse cx="100" cy="124" rx="70" ry="6" fill="#e7eeea"/><path d="M48 96h96l8-28H64L48 96Z" fill="#d5dee2" stroke="#6d7c82" stroke-width="2"/><path d="M64 68V40h8" stroke="#6d7c82" stroke-width="4" stroke-linecap="round"/><rect x="78" y="46" width="62" height="8" rx="2" fill="#9aadb4"/><circle cx="70" cy="108" r="10" fill="#eef3f4" stroke="#297c49" stroke-width="3"/><circle cx="126" cy="108" r="10" fill="#eef3f4" stroke="#297c49" stroke-width="3"/></svg>
        @break
    @case('bin')
        <svg viewBox="0 0 200 140" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><ellipse cx="100" cy="122" rx="58" ry="6" fill="#e7eeea"/><path d="M52 48h96l-8 62H60L52 48Z" fill="#e7f2ea" stroke="#297c49" stroke-width="2"/><rect x="46" y="40" width="108" height="12" rx="3" fill="#cfe3d4" stroke="#297c49" stroke-width="2"/><path d="M78 40c0-10 10-16 22-16s22 6 22 16" fill="none" stroke="#297c49" stroke-width="3"/><path d="M72 70h56M76 88h48" stroke="#297c49" stroke-width="2" opacity=".45" stroke-linecap="round"/></svg>
        @break
    @case('gio')
        <svg viewBox="0 0 200 140" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><ellipse cx="100" cy="122" rx="66" ry="6" fill="#e7eeea"/><ellipse cx="108" cy="86" rx="48" ry="22" fill="#d5dee2" stroke="#6d7c82" stroke-width="2"/><rect x="46" y="58" width="52" height="46" rx="8" fill="#c5d2d6" stroke="#6d7c82" stroke-width="2"/><rect x="58" y="40" width="28" height="22" rx="4" fill="#9aadb4" stroke="#6d7c82"/><circle cx="72" cy="80" r="7" fill="#297c49"/><path d="M96 78h28" stroke="#6d7c82" stroke-width="3" stroke-linecap="round"/></svg>
        @break
    @case('steamer')
        <svg viewBox="0 0 200 140" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><ellipse cx="100" cy="124" rx="50" ry="6" fill="#e7eeea"/><rect x="62" y="28" width="76" height="90" rx="6" fill="#d5dee2" stroke="#6d7c82" stroke-width="2"/><rect x="72" y="40" width="56" height="28" rx="3" fill="#eef3f4" stroke="#6d7c82"/><rect x="72" y="74" width="56" height="28" rx="3" fill="#eef3f4" stroke="#6d7c82"/><circle cx="118" cy="54" r="3" fill="#297c49"/><circle cx="118" cy="88" r="3" fill="#297c49"/><rect x="86" y="18" width="28" height="10" rx="2" fill="#9aadb4"/></svg>
        @break
    @case('griddle')
        <svg viewBox="0 0 200 140" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><ellipse cx="90" cy="122" rx="70" ry="6" fill="#e7eeea"/><rect x="24" y="58" width="132" height="46" rx="6" fill="#c5d2d6" stroke="#6d7c82" stroke-width="2"/><rect x="32" y="44" width="116" height="18" rx="3" fill="#e8eef0" stroke="#6d7c82" stroke-width="1.5"/><circle cx="48" cy="82" r="6" fill="#297c49"/><circle cx="68" cy="82" r="6" fill="#9aadb4"/><rect x="88" y="74" width="48" height="16" rx="3" fill="#7d8e94"/><path d="M40 104h100" stroke="#6d7c82" stroke-width="3" stroke-linecap="round"/></svg>
        @break
    @case('modern')
        <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24 6 10 12v10c0 9 5.6 15 14 18 8.4-3 14-9 14-18V12L24 6Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="m18 24 4 4 8-8" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        @break
    @case('attp')
        <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="24" cy="18" r="9" stroke="currentColor" stroke-width="2"/><path d="m20 18 2.4 2.4L28 15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M18 26h12l-2 4h-8l-2-4Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="m16 30 2.2 8h11.6L32 30" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>
        @break
    @case('clean')
        <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18 6h6l2 16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M16 22h16l-2 16H18l-2-16Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><path d="M20 28v8M24 26v10M28 28v8" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
        @break
    @case('gear')
        <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19 8h10l1.4 4.2 3.8 1.5 3.2-3.2 4.6 4.6-3.2 3.2 1.5 3.8L44 24v8l-4.2 1.4-1.5 3.8 3.2 3.2-4.6 4.6-3.2-3.2-3.8 1.5L29 48h-10l-1.4-4.2-3.8-1.5-3.2 3.2-4.6-4.6 3.2-3.2-1.5-3.8L4 32v-8l4.2-1.4 1.5-3.8-3.2-3.2 4.6-4.6 3.2 3.2 3.8-1.5L19 8Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/><circle cx="24" cy="28" r="5" stroke="currentColor" stroke-width="2"/></svg>
        @break
    @case('origin')
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 21c-4-.8-7-4-7.5-8 3.2.2 5.6 2 6.5 5.2Z" fill="currentColor"/><path d="M12.6 21c4-.8 7-4 7.5-8-3.2.2-5.6 2-6.5 5.2Z" fill="currentColor"/><path d="M12 21V6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
        @break
    @case('shield')
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 3 5 6v5c0 5 3 8.2 7 10 4-1.8 7-5 7-10V6l-7-3Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><path d="m9 12 2 2 4-4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>
        @break
    @case('badge')
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="10" r="6" stroke="currentColor" stroke-width="1.6"/><path d="m9.5 10 1.6 1.6L15 8.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/><path d="m8 15 4 6 4-6" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/></svg>
        @break
    @case('supply')
        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M3 7h11v8H3V7Z" stroke="currentColor" stroke-width="1.6"/><path d="M14 10h4l3 3v2h-7v-5Z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/><circle cx="7" cy="17.5" r="1.6" stroke="currentColor" stroke-width="1.6"/><circle cx="17" cy="17.5" r="1.6" stroke="currentColor" stroke-width="1.6"/></svg>
        @break
    @case('shield-attp')
        <svg viewBox="0 0 88 100" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M44 4 8 18v28c0 24 14 38 36 48 22-10 36-24 36-48V18L44 4Z" fill="#297c49"/><text x="44" y="58" text-anchor="middle" fill="#fff" font-family="Montserrat, sans-serif" font-size="16" font-weight="800">ATTP</text></svg>
        @break
    @case('kitchen')
        <svg viewBox="0 0 180 120" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M18 96V48h40v48" stroke="#b7c0bc" stroke-width="1.6"/><path d="M26 56h24M26 66h24M30 74v14h16V74" stroke="#b7c0bc" stroke-width="1.6"/><rect x="70" y="28" width="46" height="68" stroke="#b7c0bc" stroke-width="1.6"/><path d="M78 40h30M78 52h30M93 28v68" stroke="#b7c0bc" stroke-width="1.4"/><path d="M128 96V36h34v60" stroke="#b7c0bc" stroke-width="1.6"/><path d="M134 48h22M134 60h22M134 72h22" stroke="#b7c0bc" stroke-width="1.4"/><path d="M12 96h156" stroke="#c5cdc9" stroke-width="1.6" stroke-linecap="round"/></svg>
        @break
    @case('leaf')
        <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path fill="currentColor" d="M26 4C16 6 8 14 7 24c7-1 13-6 19-20Z"/><path fill="currentColor" d="M24 8C15 14 10 22 9 30c8-3 14-10 15-22Z" opacity=".8"/><path d="M11 26c5-6 9-10 13-13" stroke="#fff" stroke-width="1.2" fill="none" stroke-linecap="round"/></svg>
        @break
@endswitch
