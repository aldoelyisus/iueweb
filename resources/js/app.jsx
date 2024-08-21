import React from 'react';
import ReactDOM from 'react-dom/client';

const app = ()=> {
    return (
        <div>app</div>
    )
}

export default app

if (document.getElementById('root')) {
    const Index = ReactDOM.createRoot(document.getElementById("example"));

    Index.render(
        <React.StrictMode>
            <app/>
        </React.StrictMode>
    )
}