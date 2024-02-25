import * as FilePond from 'filepond';

FilePond.registerPlugin(
  FilePondPluginFileValidateType,
  // FilePondPluginImageExifOrientation,
  FilePondPluginImagePreview,
  FilePondPluginImageCrop,
  FilePondPluginImageResize,
  FilePondPluginImageTransform,
  // FilePondPluginImageEdit
);


FilePond.create(
  document.querySelector('.filepond'),
  {
    labelIdle: `Criar uma foto aqui`,
    imagePreviewHeight: 100,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 100,
    imageResizeTargetHeight: 100,
    stylePanelLayout: 'compact square',
    styleLoadIndicatorPosition: 'center bottom',
    styleProgressIndicatorPosition: 'right bottom',
    styleButtonRemoveItemPosition: 'left bottom',
    styleButtonProcessItemPosition: 'right bottom',
  }
);

FilePond.create(
  document.querySelector('#cnh'),
  {
    labelIdle: `<i class="bi bi-cloud-arrow-up"></i> Foto CNH`,
    imagePreviewHeight: 100,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 100,
    imageResizeTargetHeight: 100,
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
    imageResizeTargetWidth: 100,
    imageResizeTargetHeight: 100,
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
    imageResizeTargetWidth: 100,
    imageResizeTargetHeight: 100,
    stylePanelLayout: 'compact square',
    styleLoadIndicatorPosition: 'center bottom',
    styleProgressIndicatorPosition: 'right bottom',
    styleButtonRemoveItemPosition: 'left bottom',
    styleButtonProcessItemPosition: 'right bottom',
  }
);