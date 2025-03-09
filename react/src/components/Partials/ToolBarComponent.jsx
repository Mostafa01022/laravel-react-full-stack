export default function Toolbar({ toolBarTitle }) {
    return (
        <div className='bg-white'>
            {/* Horizontal Rule to Separate Navbar and Toolbar */}
            <hr className="m-0" />

            {/* Toolbar Section */}
            <div className="toolbar  py-3 border-bottom">
                <div className="container-fluid d-flex align-items-center justify-content-between">

                    {/* Page Title */}
                    <h1 className="text-dark fw-bold fs-4 m-0">{toolBarTitle}</h1>

                    {/* Optional Breadcrumb or Actions */}
                    <div className="d-none d-md-block">
                        {/* You can add breadcrumbs, buttons, or actions here */}
                    </div>
                </div>
            </div>
        </div>
    );
}
