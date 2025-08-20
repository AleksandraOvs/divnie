(function(wp){
  const { registerBlockType } = wp.blocks;
  const { useBlockProps, InnerBlocks, InspectorControls } = wp.blockEditor;
  const { PanelBody, RangeControl, ToggleControl, TextControl } = wp.components;
  const { createElement: el, Fragment } = wp.element;

  registerBlockType('custom/swiper-block', {
    edit: function(props) {
      const { attributes, setAttributes } = props;
      const { slidesMobile, slidesTablet, slidesDesktop, autoplay, autoplayDelay, autoHeight } = attributes;
      const blockProps = useBlockProps();

      return el(Fragment, {},
        el(InspectorControls, {},
          el(PanelBody, { title: 'Настройки слайдера', initialOpen: true },
            el(RangeControl, {
              label: 'Mobile slides',
              value: slidesMobile,
              onChange: function(value){ setAttributes({ slidesMobile: value }); },
              min: 1, max: 6
            }),
            el(RangeControl, {
              label: 'Tablet slides',
              value: slidesTablet,
              onChange: function(value){ setAttributes({ slidesTablet: value }); },
              min: 1, max: 6
            }),
            el(RangeControl, {
              label: 'Desktop slides',
              value: slidesDesktop,
              onChange: function(value){ setAttributes({ slidesDesktop: value }); },
              min: 1, max: 6
            }),
            el(ToggleControl, {
              label: 'Autoplay',
              checked: autoplay,
              onChange: function(value){ setAttributes({ autoplay: value }); }
            }),
            autoplay ? el(TextControl, {
              label: 'Autoplay Delay (ms)',
              type: 'number',
              value: autoplayDelay,
              onChange: function(value){ setAttributes({ autoplayDelay: parseInt(value || '0') || 0 }); }
            }) : null,
            el(ToggleControl, {
              label: 'Auto Height',
              checked: autoHeight,
              onChange: function(value){ setAttributes({ autoHeight: value }); }
            })
          )
        ),
        el('div', Object.assign({}, blockProps, {
            className: (blockProps.className ? blockProps.className + ' ' : '') + 'swiper',
            'data-mobile': slidesMobile,
            'data-tablet': slidesTablet,
            'data-desktop': slidesDesktop,
            'data-autoplay': autoplay,
            'data-delay': autoplayDelay,
            'data-autoheight': autoHeight
          }),
          el('div', { className: 'swiper-wrapper' },
            el(InnerBlocks, {
              allowedBlocks: ['custom/swiper-slide'],
              template: [['custom/swiper-slide']],
              renderAppender: InnerBlocks.ButtonBlockAppender
            })
          ),
          el('div', { className: 'swiper-pagination' }),
          el('div', { className: 'swiper-button-prev' }),
          el('div', { className: 'swiper-button-next' })
        )
      );
    },

    save: function(props) {
      const { slidesMobile, slidesTablet, slidesDesktop, autoplay, autoplayDelay, autoHeight } = props.attributes;
      return el('div', {
          className: 'swiper',
          'data-mobile': slidesMobile,
          'data-tablet': slidesTablet,
          'data-desktop': slidesDesktop,
          'data-autoplay': autoplay,
          'data-delay': autoplayDelay,
          'data-autoheight': autoHeight
        },
        el('div', { className: 'swiper-wrapper' }, el(InnerBlocks.Content, null)),
        el('div', { className: 'swiper-pagination' }),
        el('div', { className: 'swiper-button-prev' }),
        el('div', { className: 'swiper-button-next' })
      );
    }
  });
})(window.wp);
