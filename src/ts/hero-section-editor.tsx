// @ts-ignore
declare let wp;

(((blocks, element, blockEditor) => {
    var el = element.createElement;
    var RichText = blockEditor.RichText;
    
    blocks.registerBlockType('elements/hero-section', {
        title: 'Hero Section',
        icon: 'cover-image',
        category: 'layout',
        attributes: {
            title: {
                type: 'string',
                default: 'Hero Section Title',
            }
        },
        
        edit: (props) => {
            var attributes = props.attributes;
            
            function onChangeTitle(newTitle) {
                props.setAttributes({title: newTitle});
            }
            
            return el('div', {
                className: props.className
            },
                el(RichText, {
                    tagName: 'h2',
                    className: 'hero-section-title',
                    value: attributes.title,
                    onChange: onChangeTitle,
                    placeholder: 'Enter hero title here...'
                })
            );
        },
        
        save: () => {
            // This is handled by the server-side rendering function
            return null;
        }
    });
})(
    wp.blocks,
    wp.element,
    wp.blockEditor
));
