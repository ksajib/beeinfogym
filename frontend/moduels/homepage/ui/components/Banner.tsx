import Navbar from '@/components/common/navbar';
import React from 'react';

const Banner = () => {
    return (
        <div className="hero-header">
            <div className="hero-overlay"></div>

            <div className="hero-content">
                <Navbar />

                {/* CENTER WRAPPER */}
                <div className="max-w-7xl mx-auto px-4 h-full flex items-center">
                    <div className="grid grid-cols-2 gap-10 w-full text-white">
                        <div>Left content</div>

                        <div className='text-center'>Right content</div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Banner;
