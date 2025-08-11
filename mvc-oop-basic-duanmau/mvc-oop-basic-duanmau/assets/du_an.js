function switchToRegister() {
      document.getElementById('formArea').classList.add('active');
      const msg = document.querySelector('.custom-require-register');
      if (msg) msg.style.display = 'none';
    }

    function switchToLogin() {
      document.getElementById('formArea').classList.remove('active');
    }

    function showRegisterNotice() {
      const msg = document.querySelector('.custom-require-register');
      if (msg) msg.style.display = 'block';
    }
    const tabs = document.querySelectorAll('.tab');
    const contents = document.querySelectorAll('.tab-content');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            contents.forEach(c => c.classList.remove('active'));

            tab.classList.add('active');
            document.getElementById(`tab-${tab.dataset.tab}`).classList.add('active');
        });
    });