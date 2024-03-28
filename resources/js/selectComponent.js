window.callSelectConfig = function () {

  document.addEventListener('livewire:load', function () {
    console.log($('.dinamicSelect'))
    var select = new TomSelect('.dinamicSelect', {
      plugins: ['remove_button'],
    });

    Livewire.on('optionsUpdated', function (options) {
      select.clearOptions();
      options.forEach(function (option) {
        select.addOption({ value: option, text: option });
      });
    });
  });
}

callSelectConfig()