module.exports = {
    methods: {
        /**
         * Translate the given key.
         */
        __(key) {
            let translation = key;
            if (window.translations) {
                translation = window.translations[key] || key;
            }
            return translation;

        }
    },
}