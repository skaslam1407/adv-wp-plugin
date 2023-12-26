(function () {
    var registerBlockType = wp.blocks.registerBlockType;
    var createElement = wp.element.createElement;
    var RichText = wp.editor.RichText;

    registerBlockType('custom-editor-plugin/custom-block', {
        title: 'Custom Block',
        icon: 'universal-access-alt',
        category: 'common',
        attributes: {
            content: {
                type: 'string',
                default: '',
            },
        },
        edit: function (props) {
            function updateContent(newContent) {
                props.setAttributes({ content: newContent });
            }

            return createElement(
                'div',
                null,
                createElement(
                    RichText,
                    {
                        value: props.attributes.content,
                        onChange: function (newContent) {
                            updateContent(newContent);
                        },
                    }
                )
            );
        },
        save: function (props) {
            return createElement(
                'div',
                null,
                createElement(
                    'p',
                    null,
                    props.attributes.content
                )
            );
        },
    });
})();
