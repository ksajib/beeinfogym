'use client';
import Image from 'next/image';
import Link from 'next/link';
import { usePathname } from 'next/navigation';
import { Button } from '../ui/button';
import { MoveRightIcon } from 'lucide-react';

const Navbar = () => {
    const pathName = usePathname();

    const navigationLinks = [
        { title: 'Home', href: '/' },
        { title: 'About', href: '/about' },
        { title: 'Access control', href: '/gym-access-control' },
        { title: 'pricing', href: '/pricing' },
        { title: 'Fitness Blog', href: '/fitness-blog' },
        { title: 'Carreers', href: '/careers' },
        { title: 'Contact', href: '/contact' },
    ];

    console.log('pathName', pathName, typeof pathName);

    return (
        <nav className="max-w-7xl  mx-auto px-0 py-3 flex items-center justify-between">
            {/* Logo */}
            <div className="flex items-center">
                <Link href="/">
                    <Image src="/images/logo-light.png" alt="Logo" width={160} height={50} />
                </Link>
            </div>

            {/* Navigation Links */}
            <div className="flex items-center gap-7">
                {navigationLinks.map((link, i) => (
                    <Link
                        key={i}
                        href={link.href}
                        className={`font-mono uppercase text-sm font-normal ${pathName === link.href ? 'text-[#f5c518]' : 'text-white'}`}
                    >
                        {link.title}
                    </Link>
                ))}

                <Button
                    variant="cta"
                    className="font-mono rounded px-5 text-sm py-5 flex gap-2 items-center"
                >
                    Get Started
                    <MoveRightIcon />
                </Button>
            </div>
        </nav>
    );
};

export default Navbar;
