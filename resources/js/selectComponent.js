// window.callSelectConfig = function () {

//   document.addEventListener('livewire:init', function () {

//     const elements = document.querySelectorAll('select.dinamicSelect:not(.tomselected)');

//     elements.forEach(function (element) {
//       var select = new TomSelect(element, {
//         plugins: ['remove_button'],
//       });

//       Livewire.on('optionsUpdated', function (options) {
//         select.clearOptions();
//         options.forEach(function (option) {
//           select.addOption({ value: option, text: option });
//         });
//       });
//     })

//   });
// }

// callSelectConfig()