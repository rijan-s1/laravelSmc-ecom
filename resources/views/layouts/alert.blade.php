@if(Session::has('success'))
<div id="success-alert" class="fixed top-4 right-4 z-50">
    <div class="bg-green-50 border border-green-200 rounded-lg p-4 shadow-lg w-full max-w-xs">
      <div class="flex">
        <div class="flex-shrink-0">
          <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
          </svg>
        </div>
        <div class="ml-3">
          <p class="text-sm font-medium text-green-800">Success!</p>
          <p id="alert-message" class="text-sm text-green-600 mt-1">{{session('success')}}</p>
        </div>
        <div class="ml-auto pl-3">
          <button onclick="hideAlert()" class="text-green-500 hover:text-green-600">
            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>

  <script>
    let alertTimeout;

    function showAlert(message = 'Action completed successfully.') {
      const alert = document.getElementById('success-alert');
      const messageEl = document.getElementById('alert-message');

      // Clear any existing timeout
      clearTimeout(alertTimeout);

      // Update message
      messageEl.textContent = message;

      // Show alert
      alert.classList.remove('hidden');
      alert.classList.add('animate-fade-in');

      // Auto-hide after 3 seconds
      alertTimeout = setTimeout(hideAlert, 3000);
    }

    function hideAlert() {
      const alert = document.getElementById('success-alert');
      alert.classList.add('animate-fade-out');
      setTimeout(() => {
        alert.classList.add('hidden');
        alert.classList.remove('animate-fade-in', 'animate-fade-out');
      }, 3000);
    }

    setTimeout(hideAlert, 3000);
  </script>

  <style>
    .animate-fade-in {
      animation: fadeIn 0.3s ease-out forwards;
    }

    .animate-fade-out {
      animation: fadeOut 0.3s ease-out forwards;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeOut {
      from { opacity: 1; transform: translateY(0); }
      to { opacity: 0; transform: translateY(-10px); }
    }
  </style>
@endif
@if(Session::has('error'))
<div id="error-alert" class="fixed top-4 right-4 z-50 mt-20">
  <div class="bg-red-50 border border-red-200 rounded-lg p-4 shadow-lg w-full max-w-xs">
    <div class="flex">
      <div class="flex-shrink-0">
        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm-1-4h2v2h-2v-2zm0-8h2v6h-2V6z" clip-rule="evenodd"/>
        </svg>
      </div>
      <div class="ml-3">
        <p class="text-sm font-medium text-red-800">Error!</p>
        <p id="error-alert-message" class="text-sm text-red-600 mt-1">{{ session('error') }}</p>
      </div>
      <div class="ml-auto pl-3">
        <button onclick="hideErrorAlert()" class="text-red-500 hover:text-red-600">
          <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
          </svg>
        </button>
      </div>
    </div>
  </div>
</div>

<script>
  let errorAlertTimeout;

  function showErrorAlert(message = 'Something went wrong.') {
    const alert = document.getElementById('error-alert');
    const messageEl = document.getElementById('error-alert-message');

    clearTimeout(errorAlertTimeout);

    messageEl.textContent = message;

    alert.classList.remove('hidden');
    alert.classList.add('animate-fade-in');

    errorAlertTimeout = setTimeout(hideErrorAlert, 3000);
  }

  function hideErrorAlert() {
    const alert = document.getElementById('error-alert');
    alert.classList.add('animate-fade-out');
    setTimeout(() => {
      alert.classList.add('hidden');
      alert.classList.remove('animate-fade-in', 'animate-fade-out');
    }, 3000);
  }

  setTimeout(hideErrorAlert, 3000);
</script>
@endif
