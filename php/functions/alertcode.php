<style>
    button.s {
        background: #01B940;
        color: white;
    }

    button.w {
        background: #ffc400;
        color: #836400;
    }

    button.d {
        background: #F91E00;
        color: white;
    }

    button.cstm1 {
        background: #4f70ff;
        color: white;
    }

    button.cstm2 {
        background: #ff66b3;
        color: white;
    }

    button.cstm3 {
        background: linear-gradient(60deg, #3866ff, #38c0ff);
        color: white;
    }

    button.cstm4 {
        background: linear-gradient(60deg, #ff2c2c, #ff9564);
        color: white;
    }

    button.cstm5 {
        background: linear-gradient(60deg, #00ad34, #0ee4c7);
        color: white;
    }

    #Noti_container {
        width: 200px;
        position: fixed;
        top: 0;
        right: 0;
        z-index: 9999999999999999999999999999999999999999;
        margin: 10px;
        /* font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; */
        font-size: 0.8rem;
        /* font-weight: 500; */
    }

    #Noti_container ion-icon {
        font-size: large;
    }

    .Noti_success {
        padding: 10px 10px;
        background: #01B940;
        color: white;
        width: 100%;
        margin: 6px 0px;
        border-radius: 3px;

    }

    .Noti_warning {
        padding: 10px 10px;
        background: #ae8500;
        color: white;
        width: 100%;
        margin: 6px 0px;
        border-radius: 3px;
    }

    .Noti_danger {
        padding: 10px 10px;
        background: #F91E00;
        color: #ffffff;
        width: 100%;
        margin: 6px 0px;
        border-radius: 3px;
    }

    @keyframes Noti_animation {
        0% {
            transform: scale(0.5);
        }

        50% {
            transform: scale(1.07);
        }

        100% {
            transform: scale(1);
        }
    }

    @-webkit-keyframes Noti_animation {
        0% {
            transform: scale(0.5);
        }

        50% {
            transform: scale(1.07);
        }

        100% {
            transform: scale(1);
        }
    }

    .timer_progress {
        height: 2px;
        background-color: rgba(255, 245, 245, 0.7);
        position: absolute;
        margin-top: -8px;
    }

    @keyframes timer_progress_animation {
        from {
            width: 100%;
        }

        to {
            width: 0%;
            transform: rotate(0deg);
        }
    }

    @-webkit-keyframes timer_progress_animation {
        from {
            width: 100%;
        }

        to {
            width: 0%;
            transform: rotate(0deg);
        }
    }
</style>




<script>
    function Noti({
        content,
        status,
        animation = true,
        timer = 4000,
        progress = true,
        bgcolor,
        icon = 'show'
    }) {
        const container = document.createElement('div');
        container.id = 'Noti_container';
        document.body.appendChild(container);

        const alert = document.createElement('div');
        container.appendChild(alert);

        const timerProgress = document.createElement('div');
        timerProgress.className = 'timer_progress';

        if (progress !== false) {
            container.appendChild(timerProgress);
        }

        alert.style.cssText = `
    display: flex;
    flex-direction: row-reverse;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    background: ${bgcolor};
    ${animation ? '-webkit-animation: 1s Noti_animation; animation: 1s Noti_animation;' : ''}
  `;

        alert.addEventListener('click', () => {
            alert.remove();
            timerProgress.remove();
        });

        const notiDestroy = () => {
            // console.log(alert);
            container.removeChild(alert);
            timerProgress.remove();
        };

        const timeout = setTimeout(notiDestroy, Math.min(timer, 10000));

        alert.onmouseover = () => {
            clearTimeout(timeout);
            timerProgress.style.animationPlayState = 'paused';

            alert.onmouseleave = () => {
                setTimeout(notiDestroy, timer);
                timerProgress.style.animationPlayState = 'running';
            };
        };

        switch (status) {
            case 'success':
                alert.className = 'Noti_success';
                alert.innerHTML = icon === 'show' || icon === '' ?
                    `&#10003; &nbsp; <span>${content}</span>` :
                    content;
                break;
            case 'warning':
                alert.className = 'Noti_warning';
                alert.innerHTML = icon === 'show' || icon === '' ?
                    `&#33; &nbsp; <span>${content}</span>` :
                    content;
                break;
            case 'danger':
                alert.className = 'Noti_danger';
                alert.innerHTML = icon === 'show' || icon === '' ?
                    `&#10007; &nbsp; <span>${content}</span>` :
                    content;
                break;
            default:
                alert.className = 'Noti_success';
                alert.innerHTML = `&#10003; &nbsp; <span>${content}</span>`;
                break;
        }

        const timerMode = ['1s', '2s', '3s', '4s', '5s', '6s', '7s', '8s', '9s', '10s'][Math.floor(timer / 1000) - 1] || '4s';
        timerProgress.style.cssText = `animation: ${timerMode} timer_progress_animation; -webkit-animation: ${timerMode} timer_progress_animation;`;
    }
</script>



<?php

function display_alert()
{
    if(!empty($_SESSION['FlashMessages'])){
        $mesg = $_SESSION['FlashMessages']['success'] ?? '';
        unset($_SESSION['FlashMessages']['success']);
        if($mesg != ''){
            echo "<script>  Noti({ status: 'success', content: '$mesg' }); </script>";
        }
    }

    if(!empty($_SESSION['FlashMessages'])){
        $mesg = $_SESSION['FlashMessages']['warning'] ?? '';
        unset($_SESSION['FlashMessages']['warning']);
        if($mesg != ''){
            echo "<script>  Noti({ status: 'warning', content: '$mesg' }); </script>";
        }
    }

    if(!empty($_SESSION['FlashMessages'])){
        $mesg = $_SESSION['FlashMessages']['danger'] ?? '';
        unset($_SESSION['FlashMessages']['danger']);
        if($mesg != ''){
            echo "<script>  Noti({ status: 'danger', content: '$mesg' }); </script>";
        }
    }
}



?>



<!-- Noti({ status: 'danger', content: 'my name is abhinandan' }); -->