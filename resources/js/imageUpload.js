import * as FilePond from 'filepond';

FilePond.registerPlugin(
  FilePondPluginFileValidateType,
  // FilePondPluginImageExifOrientation,
  FilePondPluginImagePreview,
  FilePondPluginImageCrop,
  FilePondPluginImageResize,
  FilePondPluginImageTransform,
  FilePondPluginFileEncode,
  // FilePondPluginImageEdit
);


FilePond.create(
  document.querySelector('.filepond'),
  {
    labelIdle: `Criar uma foto aqui`,
    imagePreviewHeight: 100,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 500,
    imageResizeTargetHeight: 500,
    stylePanelLayout: 'compact square',
    styleLoadIndicatorPosition: 'center bottom',
    styleProgressIndicatorPosition: 'right bottom',
    styleButtonRemoveItemPosition: 'left bottom',
    styleButtonProcessItemPosition: 'right bottom',
    allowFileEncode: true,
  }
);

FilePond.create(
  document.querySelector('#cnh'),
  {
    labelIdle: `<i class="bi bi-cloud-arrow-up"></i> Foto CNH`,
    imagePreviewHeight: 100,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 500,
    imageResizeTargetHeight: 500,
    stylePanelLayout: 'compact square',
    styleLoadIndicatorPosition: 'center bottom',
    styleProgressIndicatorPosition: 'right bottom',
    styleButtonRemoveItemPosition: 'left bottom',
    styleButtonProcessItemPosition: 'right bottom',
  }
);

FilePond.create(
  document.querySelector('#cnv'),
  {
    labelIdle: `<i class="bi bi-cloud-arrow-up"></i> Foto CNV`,
    imagePreviewHeight: 100,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 500,
    imageResizeTargetHeight: 500,
    stylePanelLayout: 'compact square',
    styleLoadIndicatorPosition: 'center bottom',
    styleProgressIndicatorPosition: 'right bottom',
    styleButtonRemoveItemPosition: 'left bottom',
    styleButtonProcessItemPosition: 'right bottom',
  }
);

FilePond.create(
  document.querySelector('#documento'),
  {
    labelIdle: `<i class="bi bi-cloud-arrow-up"></i> Foto Documento`,
    imagePreviewHeight: 100,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 500,
    imageResizeTargetHeight: 500,
    stylePanelLayout: 'compact square',
    styleLoadIndicatorPosition: 'center bottom',
    styleProgressIndicatorPosition: 'right bottom',
    styleButtonRemoveItemPosition: 'left bottom',
    styleButtonProcessItemPosition: 'right bottom',
  }
);

FilePond.create(
  document.querySelector('#imagem'),
  {
    labelIdle: `<i class="bi bi-cloud-arrow-up"></i> Foto do veiculo`,
    imagePreviewHeight: 100,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 500,
    imageResizeTargetHeight: 500,
    stylePanelLayout: 'compact square',
    styleLoadIndicatorPosition: 'center bottom',
    styleProgressIndicatorPosition: 'right bottom',
    styleButtonRemoveItemPosition: 'left bottom',
    styleButtonProcessItemPosition: 'right bottom',
  }
);

