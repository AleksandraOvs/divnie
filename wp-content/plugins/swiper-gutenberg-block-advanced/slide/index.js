(function(wp){
  const { registerBlockType } = wp.blocks;
  const { useBlockProps, InnerBlocks } = wp.blockEditor;
  const { createElement: el } = wp.element;

  registerBlockType('custom/swiper-slide', {
    edit: function() {
      const blockProps = useBlockProps({ className: 'swiper-slide' });
      return el('div', blockProps,
        el(InnerBlocks, {
          template: [['core/paragraph', { placeholder: 'Введите текст или вставьте изображение' }]],
          templateLock: false
        })
      );
    },

    save: function() {
      const blockProps = useBlockProps.save({ className: 'swiper-slide' });
      return el('div', blockProps, el(InnerBlocks.Content, null));
    }
  });
})(window.wp);
