<style>

.whatsapp-float{

    position:fixed;

    right:25px;

    bottom:100px;

    width:65px;

    height:65px;

    border-radius:50%;

    background:#25D366;

    display:flex;

    justify-content:center;

    align-items:center;

    text-decoration:none;

    box-shadow:0 15px 35px rgba(37,211,102,.35);

    z-index:9990;

    opacity:0;

    visibility:hidden;

    transform:translateY(30px) scale(.9);

    transition:.4s ease;

    animation:whatsappPulse 3s infinite;

}

.whatsapp-float.show{

    opacity:1;

    visibility:visible;

    transform:translateY(0) scale(1);

}

.whatsapp-float:hover{

    transform:translateY(-5px) scale(1.08);

    box-shadow:0 20px 45px rgba(37,211,102,.45);

}

.whatsapp-float img{

    width:34px;

    height:34px;

}

.whatsapp-tooltip{

    position:absolute;

    right:80px;

    background:#111;

    color:#fff;

    padding:10px 15px;

    border-radius:10px;

    font-size:14px;

    white-space:nowrap;

    opacity:0;

    visibility:hidden;

    transition:.3s;

    box-shadow:0 10px 25px rgba(0,0,0,.25);

}

.whatsapp-float:hover .whatsapp-tooltip{

    opacity:1;

    visibility:visible;

}

.whatsapp-notification{

    position:absolute;

    top:2px;

    right:2px;

    width:12px;

    height:12px;

    background:#ff3b30;

    border-radius:50%;

    border:2px solid #fff;

}

@keyframes whatsappPulse{

0%{

box-shadow:0 0 0 0 rgba(37,211,102,.45);

}

70%{

box-shadow:0 0 0 18px rgba(37,211,102,0);

}

100%{

box-shadow:0 0 0 0 rgba(37,211,102,0);

}

}

@media(max-width:768px){

.whatsapp-float{

    width:58px;

    height:58px;

    right:18px;

    bottom:90px;

}

.whatsapp-float img{

    width:30px;

    height:30px;

}

.whatsapp-tooltip{

    display:none;

}

}

</style>

<a
id="whatsappFloat"
class="whatsapp-float"
href="https://wa.me/201055562743?text=Hello%20SNUS%20Egypt,%20I%20would%20like%20to%20know%20more%20about%20your%20products."
target="_blank"
rel="noopener noreferrer">

    <span class="whatsapp-tooltip">
        Chat with SNUS Egypt
    </span>

    <span class="whatsapp-notification"></span>

<img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg"></a>

<script>

document.addEventListener("DOMContentLoaded",function(){

    const whatsapp=document.getElementById("whatsappFloat");

    function showWhatsapp(){

        setTimeout(function(){

            whatsapp.classList.add("show");

        },2000);

    }

    const gate=document.getElementById("ageGate");

    if(gate){

        const observer=new MutationObserver(function(){

            if(!document.body.contains(gate)){

                showWhatsapp();

                observer.disconnect();

            }

        });

        observer.observe(document.body,{
            childList:true,
            subtree:true
        });

    }else{

        showWhatsapp();

    }

});

</script>