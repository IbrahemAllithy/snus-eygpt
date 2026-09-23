<style>
/* ==========================
   AGE GATE - SNUS EGYPT
========================== */

#ageGate{
    position:fixed;
    inset:0;
    width:100%;
    height:100vh;
    background:#080808;
    display:flex;
    align-items:center;
    justify-content:center;
    z-index:999999;
    overflow:hidden;

    opacity:0;
    visibility:hidden;
    transition:.8s cubic-bezier(.22,1,.36,1);
}

#ageGate.active{
    opacity:1;
    visibility:visible;
}

#ageGate.hide{
    opacity:0;
    visibility:hidden;
    pointer-events:none;
}

.age-overlay{
    position:absolute;
    inset:0;

    background:
    radial-gradient(circle at top,
    rgba(193,154,73,.12) 0%,
    rgba(0,0,0,0) 45%),
    linear-gradient(#080808,#050505);
}

.age-card{

    position:relative;

    width:min(90%,540px);

    padding:60px;

    border-radius:26px;

    background:rgba(18,18,18,.90);

    backdrop-filter:blur(14px);

    border:1px solid rgba(193,154,73,.15);

    text-align:center;

    box-shadow:0 30px 80px rgba(0,0,0,.55);

    transform:translateY(30px) scale(.95);

    opacity:0;

    transition:.8s cubic-bezier(.22,1,.36,1);

}

#ageGate.active .age-card{

    transform:translateY(0) scale(1);

    opacity:1;

}

#ageGate.hide .age-card{

    transform:scale(.92);

    opacity:0;

}

/* Logo */

.age-logo{

    display:block;

    max-width:210px;
    max-height:90px;

    width:auto;
    height:auto;

    margin:0 auto 42px;

    object-fit:contain;

    transition:.4s;

}

.age-logo:hover{

    transform:scale(1.03);

}

/* 18+ */

.age-badge{

    width:110px;
    height:110px;

    margin:0 auto 35px;

    border-radius:50%;

    border:2px solid #C19A49;

    display:flex;
    align-items:center;
    justify-content:center;

    color:#fff;

    font-size:40px;
    font-weight:700;

    box-shadow:0 0 20px rgba(193,154,73,.15);

}

/* Heading */

.age-card h2{

    color:#fff;

    font-size:42px;

    line-height:1.1;

    margin-bottom:15px;

}

.age-card h2 span{

    display:block;

    color:#C19A49;

    margin-top:5px;

}

/* Description */

.age-card p{

    color:#9b9b9b;

    line-height:1.8;

    font-size:15px;

    margin-bottom:35px;

}

/* Button */

.enter-btn{

    width:100%;

    height:58px;

    border:none;

    border-radius:14px;

    cursor:pointer;

    color:#fff;

    font-size:16px;

    font-weight:600;

    background:linear-gradient(180deg,#D7B15A,#B58B2A);

    transition:.35s;

}

.enter-btn:hover{

    transform:translateY(-3px);

    box-shadow:0 15px 35px rgba(181,139,42,.35);

}

/* Exit */

.exit-btn{

    display:block;

    margin-top:18px;

    color:#8e8e8e;

    text-decoration:none;

    transition:.3s;

}

.exit-btn:hover{

    color:#fff;

}
</style>

<div id="ageGate">

    <div class="age-overlay"></div>

    <div class="age-card">

        <img
            src="{{ asset('assets/images/snuslogo1.png') }}"
            alt="SNUS EGYPT"
            class="age-logo">

        <div class="age-badge">
            18+
        </div>

        <h2>
            {{ site_content('global.age_title', 'WELCOME TO') }}
            <span>{{ site_content('global.age_brand', 'SNUS EGYPT') }}</span>
        </h2>

        <p>
            {{ site_content('global.age_text', 'This website contains nicotine products intended for adults aged 18 years or older.') }}
        </p>

        <button id="enterSite" class="enter-btn">
            {{ site_content('global.age_enter', 'Enter Website') }}
        </button>

        <a href="{{ site_href(site_content('global.age_leave_url', 'https://google.com'), 'https://google.com') }}" class="exit-btn">
            {{ site_content('global.age_leave', 'Leave Website') }}
        </a>

    </div>

</div>

<script>
document.addEventListener("DOMContentLoaded",function(){

    const gate=document.getElementById("ageGate");
    const btn=document.getElementById("enterSite");

    const expire=localStorage.getItem("snus-age");

    if(expire && Date.now()<Number(expire)){
        gate.remove();
        return;
    }

    setTimeout(()=>{
        gate.classList.add("active");
    },150);

    btn.addEventListener("click",function(){

        const nextMonth=Date.now()+(30*24*60*60*1000);

        localStorage.setItem("snus-age",nextMonth);

        btn.innerHTML="✓ Verified";
        btn.style.background="#2e7d32";

        setTimeout(()=>{

            gate.classList.add("hide");

            setTimeout(()=>{
                gate.remove();
            },700);

        },400);

    });

});
</script>