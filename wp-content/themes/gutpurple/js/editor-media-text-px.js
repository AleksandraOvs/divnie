(function (wp) {
    const { addFilter } = wp.hooks;
    const { createElement, Fragment } = wp.element;
    const { createHigherOrderComponent } = wp.compose;
    const { InspectorControls } = wp.blockEditor || wp.editor;
    const { PanelBody, __experimentalUnitControl: UnitControl } = wp.components;

    // Добавляем новые атрибуты
    addFilter(
        'blocks.registerBlockType',
        'custom/media-text-px-width',
        function (settings, name) {
            if (name !== 'core/media-text') return settings;

            settings.attributes = Object.assign({}, settings.attributes, {
                mediaWidthPx: { type: 'number', default: 0 },
                mediaWidthUnit: { type: 'string', default: '%' },
            });

            return settings;
        }
    );

    // Добавляем контрол в Inspector
    addFilter(
        'editor.BlockEdit',
        'custom/media-text-px-width-controls',
        createHigherOrderComponent(function (BlockEdit) {
            return function (props) {
                if (props.name !== 'core/media-text') {
                    return createElement(BlockEdit, props);
                }

                const { attributes, setAttributes } = props;
                const { mediaWidthPx, mediaWidthUnit } = attributes;

                return createElement(
                    Fragment,
                    null,
                    createElement(BlockEdit, props),
                    createElement(
                        InspectorControls,
                        null,
                        createElement(
                            PanelBody,
                            { title: 'Размер изображения (альтернатива)' },
                            createElement(UnitControl, {
                                label: 'Ширина изображения',
                                value: mediaWidthUnit === 'px' ? mediaWidthPx : attributes.mediaWidth,
                                units: [
                                    { value: '%', label: '%' },
                                    { value: 'px', label: 'px' },
                                ],
                                onChange: function (value) {
                                    const unit = String(value).includes('px') ? 'px' : '%';
                                    const numericValue = parseFloat(value);
                                    setAttributes({
                                        mediaWidthUnit: unit,
                                        mediaWidthPx: numericValue,
                                        mediaWidth: unit === '%' ? numericValue : attributes.mediaWidth,
                                    });
                                },
                            })
                        )
                    )
                );
            };
        }, 'withMediaTextPxControl')
    );

    // Меняем стили при сохранении
    addFilter(
        'blocks.getSaveContent.extraProps',
        'custom/media-text-px-width-style',
        function (extraProps, blockType, attributes) {
            if (blockType.name !== 'core/media-text') return extraProps;

            if (attributes.mediaWidthUnit === 'px' && attributes.mediaWidthPx) {
                extraProps.style = Object.assign({}, extraProps.style, {
                    '--media-text-media-width': attributes.mediaWidthPx + 'px',
                });
            }

            return extraProps;
        }
    );

})(window.wp);